<?php
session_start();
// Ensure the user is logged in and has admin privileges
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Update order status when an admin accepts or cancels an order
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    // Prepare and execute the update statement
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $order_id);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to see the updated order status
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch only pending orders
$query = "SELECT * FROM orders WHERE status = 'Pending'";
$orders = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pending Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }
        .accept {
            background-color: #28a745; 
        }
        .accept:hover {
            background-color: #218838;
        }
        .cancel {
            background-color: #dc3545; 
        }
        .cancel:hover {
            background-color: #c82333;
        }
        .go-back {
            background-color: #007bff; 
            color: white;
            text-decoration: none;
        }
        .go-back:hover {
            background-color: #0056b3;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .go-back-button {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pending Customer Orders</h1>
        <a href="admin.php" class="btn go-back go-back-button">Go Back</a>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($order = mysqli_fetch_assoc($orders)){ ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                    <td>$<?php echo htmlspecialchars($order['total_price']); ?></td>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <input type="hidden" name="status" value="Accepted">
                            <button type="submit" name="update_status" class="btn accept">Accept</button>
                        </form>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <input type="hidden" name="status" value="Canceled">
                            <button type="submit" name="update_status" class="btn cancel">Cancel</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
