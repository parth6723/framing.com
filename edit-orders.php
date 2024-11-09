<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php';

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

if (isset($_POST['update_order'])) {
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    $stmt = $conn->prepare("UPDATE orders SET customer_name = ?, product_name = ?, quantity = ?, total_price = ? WHERE id = ?");
    $stmt->bind_param("ssiii", $customer_name, $product_name, $quantity, $total_price, $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: edit-orders.php");
    exit();
}

if (isset($_POST['cancel_order'])) {
    $stmt = $conn->prepare("UPDATE orders SET status = 'Canceled' WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: edit-orders.php");
    exit();
}

if (isset($_POST['accept_order'])) {
    $stmt = $conn->prepare("UPDATE orders SET status = 'Accepted' WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();

    header("Location: edit-orders.php");
    exit();
}

$product_query = "SELECT name, price FROM products";
$product_result = mysqli_query($conn, $product_query);

if (is_null($order_id)) {
    $query = "SELECT * FROM orders WHERE status IN ('Accepted', 'Canceled')";
    $orders = mysqli_query($conn, $query);
} else {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    $stmt->close();

    if (!$order) {
        echo "Order not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn {
            background-color: #333;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .accept {
            color: white;
            font-size: 14px;
            padding: 8px 12px;
            background-color: #28a745; 
        }

        .accept:hover {
            background-color: black; 
        }

        .cancel {
            color: white;
            font-size: 14px;
            padding: 8px 12px;
            background-color: #dc3545; 
            margin-left: 10px; 
        }

        .cancel:hover {
            background-color: black; 
        }

        .go-back {
            background-color: #007bff;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .go-back:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function updateTotalPrice() {
            const quantity = document.getElementById('quantity').value;
            const pricePerUnit = document.getElementById('price_per_unit').value;
            const totalPriceField = document.getElementById('total_price');

            const totalPrice = quantity * pricePerUnit;
            totalPriceField.value = totalPrice.toFixed(2); 
        }

        function updatePricePerUnit() {
            const productSelect = document.getElementById('product_name');
            const pricePerUnitField = document.getElementById('price_per_unit');
            const selectedOption = productSelect.options[productSelect.selectedIndex];

            pricePerUnitField.value = selectedOption.dataset.price;
            updateTotalPrice(); 
        }
    </script>
</head>

<body>
    <div class="container">
        <h1><?php echo is_null($order_id) ? 'Manage Accepted and Canceled Orders' : 'Edit Order'; ?></h1>
        <a href="admin.php" class="btn go-back">Go Back</a>

        <?php if (is_null($order_id)) { ?>
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
                    <?php while ($order = mysqli_fetch_assoc($orders)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td>$<?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                            <td>
                                <a href="edit-orders.php?order_id=<?php echo $order['id']; ?>" class="btn edit">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <form method="POST">
                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($order['customer_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <select id="product_name" name="product_name" required onchange="updatePricePerUnit()">
                        <option value="">Select a product</option>
                        <?php
                        while ($product = mysqli_fetch_assoc($product_result)) {
                            $selected = ($product['name'] === $order['product_name']) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($product['name']) . '" data-price="' . htmlspecialchars($product['price']) . '" ' . $selected . '>' . htmlspecialchars($product['name']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($order['quantity']); ?>" required oninput="updateTotalPrice()">
                </div>
                <div class="form-group">
                    <label for="price_per_unit">Price per Unit</label>
                    <input type="text" id="price_per_unit" name="price_per_unit" value="<?php echo htmlspecialchars($order['total_price'] / $order['quantity']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="text" id="total_price" name="total_price" value="<?php echo htmlspecialchars($order['total_price']); ?>" readonly>
                </div>

                <?php if ($order['status'] === 'Accepted') { ?>
                    <button type="submit" class="btn cancel" name="cancel_order" class="cancel-order">Cancel Order</button>
                <?php } elseif ($order['status'] === 'Canceled') { ?>
                    <button type="submit" class="btn accept" name="accept_order">Accept Order</button>
                <?php } ?>

                <button type="submit" class="btn update" name="update_order">Update Order</button>
            </form>
        <?php } ?>
    </div>
</body>

</html>