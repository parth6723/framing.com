<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $stmt_check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
    } else {
        $stmt_admin = $conn->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
        $stmt_admin->bind_param("sss", $username, $password, $email);

        $role = 'admin';
        $stmt_users = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt_users->bind_param("ssss", $username, $password, $email, $role);

        if ($stmt_admin->execute() && $stmt_users->execute()) {
            echo "<script>alert('Admin added successfully.'); window.location.href='manage-users.php';</script>";
            exit(); 
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt_admin->close();
        $stmt_users->close();
    }

    $stmt_check->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();

    $conn->begin_transaction();

    try {
        $stmt_users = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt_users->bind_param("i", $user_id);

        $stmt_admin = $conn->prepare("DELETE FROM admin_users WHERE username = ?");
        $stmt_admin->bind_param("s", $username);

        if ($stmt_users->execute() && $stmt_admin->execute()) {
            $conn->commit();
            echo "<script>alert('User deleted successfully ');</script>";
            exit(); 
        } else {
            $conn->rollback();
            echo "<script>alert('Error: Unable to delete user.')</script>;";
        }

        $stmt_users->close();
        $stmt_admin->close();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$query = "SELECT id, username, email, role FROM users"; 
$users = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }

        h1, h2 {
            color: #333;
        }

        form {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f8f9fa;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        form input[type="submit"][value="Delete"] {
            background-color: #dc3545;
            font-size: 14px;
        }

        form input[type="submit"][value="Delete"]:hover {
            background-color: #c82333;
        }

        @media screen and (max-width: 600px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            table thead {
                display: none;
            }

            table tr {
                margin-bottom: 15px;
                display: block;
                border: 1px solid #ddd;
            }

            table td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <h1>Manage Users</h1>
    <form action="" method="POST">
        <input type="hidden" name="add_user" value="1">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Add New Admin User">
    </form>

    <h2>Existing Users or Admin</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($users->num_rows > 0) {
                while ($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td> 
                        <td>
                            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <input type="hidden" name="delete_user" value="1">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php $conn->close(); ?>

 