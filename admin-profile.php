<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT username, email FROM admin_users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($current_username, $current_email);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    if ($action === 'update_username') {
        $stmt = $conn->prepare("UPDATE admin_users SET username = ? WHERE username = ?");
        $stmt->bind_param("ss", $new_username, $current_username);
        if ($stmt->execute()) {
            $_SESSION['username'] = $new_username; // Update session if username changes
            echo "<script>alert('Username updated successfully!'); window.location.href='admin-profile.php';</script>";
            exit();
        } else {
            echo "Error updating username: " . $conn->error;
        }
    } elseif ($action === 'update_email') {
        $stmt = $conn->prepare("UPDATE admin_users SET email = ? WHERE username = ?");
        $stmt->bind_param("ss", $new_email, $current_username);
        if ($stmt->execute()) {
            echo "<script>alert('Email updated successfully!'); window.location.href='admin-profile.php';</script>";
            exit();
        } else {
            echo "Error updating email: " . $conn->error;
        }
    } elseif ($action === 'update_password') {
        if (!empty($_POST['password'])) {
            $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE admin_users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $new_password, $current_username);
            if ($stmt->execute()) {
                echo "<script>alert('Password updated successfully!'); window.location.href='admin-profile.php';</script>";
                exit();
            } else {
                echo "Error updating password: " . $conn->error;
            }
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


         a {
            color: black;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }
#btn{
    background-color: red;
}
        .navbar a:hover {
            background-color: #495057;
        }

        .navbar-toggler {
            display: none;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .fixed-box {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            z-index: 1000;
        }
    </style>
</head>

<body>

        <a href="logout.php" class="btn">Logout</a>

        <div class="fixed-box">
            <h3>Admin Details</h3>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($current_username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($current_email); ?></p>
        </div>

        <div class="container mt-5">
            <h1>Update Profile</h1>

            <h2>Change Username</h2>
            <form action="admin-profile.php" method="POST">
                <input type="hidden" name="action" value="update_username">
                <label for="username">New Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($current_username); ?>" required>
                <input type="submit" value="Update Username">
            </form>

            <h2>Change Email</h2>
            <form action="admin-profile.php" method="POST">
                <input type="hidden" name="action" value="update_email">
                <label for="email">New Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($current_email); ?>" required>
                <input type="submit" value="Update Email">
            </form>

            <h2>Change Password</h2>
            <form action="admin-profile.php" method="POST">
                <input type="hidden" name="action" value="update_password">
                <label for="password">New Password (if you want keep your old password then don't fill the box </label>
                <input type="password" id="password" name="password">
                <input type="submit" value="Update Password">
            </form>
        </div>

</body>

</html>

<?php $conn->close(); ?>