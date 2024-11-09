<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farming_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['clear_cart'])) {
    $user = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 

    $stmt = $conn->prepare("DELETE FROM cart WHERE user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->close();
}

$user = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 
$stmt = $conn->prepare("SELECT product_name, product_price, img_path, COUNT(*) AS quantity FROM cart WHERE user = ? GROUP BY product_name, product_price, img_path");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$cart_items = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$total = 0;
foreach ($cart_items as $item) {
    $total += $item['product_price'] * $item['quantity'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Farming Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1em;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .cart-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-section table, .cart-section th, .cart-section td {
            border: 1px solid #ddd;
        }
        .cart-section th, .cart-section td {
            padding: 10px;
            text-align: left;
        }
        .cart-section th {
            background-color: #f4f4f4;
        }
        .cart-section button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .cart-section button:hover {
            background-color: #c82333;
        }
        .cart-section a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .cart-section a:hover {
            background-color: #218838;
        }
        .cart-section img {
            width: 100px;
            height: auto;
        }
        .cart-section .buy-now-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            cursor: pointer;
        }
        .cart-section .buy-now-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<header>
    <h1>Your Cart</h1>
    <nav>
        <a href="farming-store.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="contact.php#contact">Contact</a>
    </nav>
</header>

<div class="container">
    <div class="cart-section">
        <form method="post">
            <button type="submit" name="clear_cart">Clear Cart</button>
        </form>
        <?php if (!empty($cart_items)): ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Buy Now</th>
                </tr>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($item['img_path']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>"></td>
                        <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                        <td>$<?php echo htmlspecialchars($item['product_price']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo htmlspecialchars($item['product_price'] * $item['quantity']); ?></td>
                        <td><a href="buy_now1.php?product=<?php echo urlencode($item['product_name']); ?>" class="buy-now-btn">Buy Now</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"><strong>Grand Total</strong></td>
                    <td><strong>$<?php echo htmlspecialchars($total); ?></strong></td>
                    <td></td>
                </tr>
            </table>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>

