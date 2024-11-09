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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Farming Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
            font-size: 2em;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 15px;
        }
        strong {
            color: #000;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            margin-top: 20px;
        }
        a:hover {
            background-color: #218838;
        }
        .order-details {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .order-details p {
            margin: 5px 0;
        }
        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<?php
if (isset($_GET['product'])) {
    $product_name = urldecode($_GET['product']);
    $user = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest'; 

    $stmt = $conn->prepare("SELECT product_price, COUNT(*) AS quantity FROM cart WHERE user = ? AND product_name = ? GROUP BY product_price");
    $stmt->bind_param("ss", $user, $product_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $total_price = $product['product_price'] * $product['quantity'];
        
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, product_name, quantity, total_price, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssii", $user, $product_name, $product['quantity'], $total_price);
        if ($stmt->execute()) {

            $stmt = $conn->prepare("DELETE FROM cart WHERE user = ? AND product_name = ?");
            $stmt->bind_param("ss", $user, $product_name);
            $stmt->execute();
            $stmt->close();

            echo "<div class='container'>";
            echo "<h1>Order Confirmation</h1>";
            echo "<div class='order-details'>";
            echo "<p>Thank you, <strong>" . htmlspecialchars($user) . "</strong>, for your order!</p>";
            echo "<p>Product: <strong>" . htmlspecialchars($product_name) . "</strong></p>";
            echo "<p>Quantity: <strong>" . htmlspecialchars($product['quantity']) . "</strong></p>";
            echo "<p>Total Price: <strong>$" . htmlspecialchars($total_price) . "</strong></p>";
            echo "</div>";
            echo "<p>Your order has been placed successfully and will be processed soon.</p>";
            echo "<a href='farming-store.php'>Go back to the store</a>";
            echo "</div>";
        } else {
            echo "<h1>Order Failed</h1>";
            echo "<p>There was an issue processing your order. Please try again later.</p>";
            echo "<a href='farming-store.php'>Go back to the store</a>";
        }
    } else {
        echo "<h1>Product not found in cart.</h1>";
        echo "<a href='cart.php'>Go back to the cart</a>";
    }
} else {
    echo "<h1>No product selected.</h1>";
    echo "<a href='cart.php'>Go back to the cart</a>";
}

$conn->close();
?>

<footer>
    &copy; 2024 Farming Store
</footer>

</body>
</html>
