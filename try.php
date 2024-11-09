<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farming_info_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$products = [
    // Seeds
    ['name' => 'Organic Wheat', 'price' => 25, 'category' => 'seeds', 'image' => 'images/seeds1.jpg'],
    ['name' => 'Rice Seeds', 'price' => 18, 'category' => 'seeds', 'image' => 'images/seeds2.jpg'],
    ['name' => 'Corn Seeds', 'price' => 22, 'category' => 'seeds', 'image' => 'images/seeds3.jpg'],
    ['name' => 'Sunflower Seeds', 'price' => 20, 'category' => 'seeds', 'image' => 'images/seeds4.jpg'],
    ['name' => 'Soybean Seeds', 'price' => 24, 'category' => 'seeds', 'image' => 'images/seeds5.jpg'],
    ['name' => 'Tomato Seeds', 'price' => 15, 'category' => 'seeds', 'image' => 'images/seeds6.jpg'],
    ['name' => 'Pepper Seeds', 'price' => 16, 'category' => 'seeds', 'image' => 'images/seeds7.jpg'],
    ['name' => 'Pumpkin Seeds', 'price' => 17, 'category' => 'seeds', 'image' => 'images/seeds8.jpg'],
    ['name' => 'Cucumber Seeds', 'price' => 12, 'category' => 'seeds', 'image' => 'images/seeds9.jpg'],
    ['name' => 'Lettuce Seeds', 'price' => 10, 'category' => 'seeds', 'image' => 'images/seeds10.jpg'],
    
    // Tools
    ['name' => 'Hand Rake', 'price' => 12, 'category' => 'tools', 'image' => 'images/tools1.jpg'],
    ['name' => 'Shovel', 'price' => 15, 'category' => 'tools', 'image' => 'images/tools2.jpg'],
    ['name' => 'Pruners', 'price' => 22, 'category' => 'tools', 'image' => 'images/tools3.jpg'],
    ['name' => 'Hoe', 'price' => 18, 'category' => 'tools', 'image' => 'images/tools4.jpg'],
    ['name' => 'Weeder', 'price' => 10, 'category' => 'tools', 'image' => 'images/tools5.jpg'],
    ['name' => 'Cultivator', 'price' => 20, 'category' => 'tools', 'image' => 'images/tools6.jpg'],
    ['name' => 'Garden Fork', 'price' => 16, 'category' => 'tools', 'image' => 'images/tools7.jpg'],
    ['name' => 'Sprayer', 'price' => 25, 'category' => 'tools', 'image' => 'images/tools8.jpg'],
    ['name' => 'Lawn Mower', 'price' => 150, 'category' => 'tools', 'image' => 'images/tools9.jpg'],
    ['name' => 'Wheelbarrow', 'price' => 50, 'category' => 'tools', 'image' => 'images/tools10.jpg'],
    
    // Fertilizers
    ['name' => 'Organic Fertilizer', 'price' => 30, 'category' => 'fertilizers', 'image' => 'images/fertilizers1.jpg'],
    ['name' => 'Chemical Fertilizer', 'price' => 25, 'category' => 'fertilizers', 'image' => 'images/fertilizers2.jpg'],
    ['name' => 'Compost', 'price' => 20, 'category' => 'fertilizers', 'image' => 'images/fertilizers3.jpg'],
    ['name' => 'Nitrogen Fertilizer', 'price' => 28, 'category' => 'fertilizers', 'image' => 'images/fertilizers4.jpg'],
    ['name' => 'Phosphorus Fertilizer', 'price' => 26, 'category' => 'fertilizers', 'image' => 'images/fertilizers5.jpg'],
    ['name' => 'Potassium Fertilizer', 'price' => 29, 'category' => 'fertilizers', 'image' => 'images/fertilizers6.jpg'],
    ['name' => 'Bio-Fertilizer', 'price' => 24, 'category' => 'fertilizers', 'image' => 'images/fertilizers7.jpg'],
    ['name' => 'Liquid Fertilizer', 'price' => 32, 'category' => 'fertilizers', 'image' => 'images/fertilizers8.jpg'],
    ['name' => 'Foliar Spray', 'price' => 35, 'category' => 'fertilizers', 'image' => 'images/fertilizers9.jpg'],
    ['name' => 'Soil Conditioner', 'price' => 30, 'category' => 'fertilizers', 'image' => 'images/fertilizers10.jpg'],
    
    // Machinery
    ['name' => 'Tractor', 'price' => 5000, 'category' => 'machinery', 'image' => 'images/machinery1.jpg'],
    ['name' => 'Harvester', 'price' => 8000, 'category' => 'machinery', 'image' => 'images/machinery2.jpg'],
    ['name' => 'Plough', 'price' => 1500, 'category' => 'machinery', 'image' => 'images/machinery3.jpg'],
    ['name' => 'Seeder', 'price' => 4000, 'category' => 'machinery', 'image' => 'images/machinery4.jpg'],
    ['name' => 'Irrigation System', 'price' => 2500, 'category' => 'machinery', 'image' => 'images/machinery5.jpg'],
    ['name' => 'Baler', 'price' => 3500, 'category' => 'machinery', 'image' => 'images/machinery6.jpg'],
    ['name' => 'Thresher', 'price' => 4500, 'category' => 'machinery', 'image' => 'images/machinery7.jpg'],
    ['name' => 'Sprayer Machine', 'price' => 1200, 'category' => 'machinery', 'image' => 'images/machinery8.jpg'],
    ['name' => 'Digger', 'price' => 6000, 'category' => 'machinery', 'image' => 'images/machinery9.jpg'],
    ['name' => 'Rotavator', 'price' => 7000, 'category' => 'machinery', 'image' => 'images/machinery10.jpg']
];

function getCategoryId($category, $conn) {
    $stmt = $conn->prepare("SELECT id FROM categories WHERE category_name = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['id'];
}

foreach ($products as $product) {
    $category_id = getCategoryId($product['category'], $conn);
    
    $stmt = $conn->prepare("INSERT INTO products (name, price, category_id, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdis", $product['name'], $product['price'], $category_id, $product['image']);
    
    if ($stmt->execute()) {
        echo "Inserted: " . $product['name'] . "<br>";
    } else {
        echo "Error inserting: " . $product['name'] . "<br>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farming Store</title>
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
        .dropdown {
            display: inline-block;
        }
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .profile {
            float: right;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            width: 23%;
            box-sizing: border-box;
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .product h3 {
            font-size: 1.2em;
            margin: 0.5em 0;
        }
        .product p {
            margin: 0.5em 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Farming Store</h1>
        <nav>
            <a href="farminghome.php">Home</a>
            <a href="cart.php#cart">Cart</a>
            <a href="contact.php#contact">Contact</a>
            <div class="dropdown">
                <button class="dropbtn">Shop by Category</button>
                <div class="dropdown-content">
                    <a href="shop-seeds.php?category=seeds">Seeds</a>
                    <a href="shop-tools.php?category=tools">Tools</a>
                    <a href="shop-fertilizers.php?category=fertilizers">Fertilizers</a>
                    <a href="shop-machinery.php?category=machinery">Machinery</a>
                </div>
            </div>
            <div class="profile">
                <?php if (isset($_SESSION['username'])): ?>
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <?php
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        ?>
        <h1><?php echo ucfirst(htmlspecialchars($category)); ?> Products</h1>
        <div class="products">
            <?php
            foreach ($products as $product) {
                if ($product['category'] == $category) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                    echo '<h3>' . htmlspecialchars($product['name']) . '</h3>';
                    echo '<p>Price: $' . htmlspecialchars($product['price']) . '</p>';
                    echo '<a href="?action=add&name=' . urlencode($product['name']) . '&price=' . urlencode($product['price']) . '">Add to Cart</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
