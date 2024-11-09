<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Products</title>
    <link rel="stylesheet" href="seed-products.css">
<style>    
.logout {
            text-align: center;
            margin: 30px 0;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .logout-btn i {
            margin-right: 8px;
        }
</style>
</head>

<body>

    <nav class="side-nav" id="sideNav">
        <div class="nav-header">
            <h2>Seed Products</h2>
            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <ul>
            <li><a href="farming-info.php"><i class="fas fa-seedling"></i> Farming Information</a></li>
            <li><a href="seed-products.php"><i class="fas fa-tractor"></i> Seed Products</a></li>
            <li><a href="community.php"><i class="fas fa-users"></i> Community</a></li>
            <li><a href="agriculture.php"><i class="fas fa-leaf"></i> Agriculture</a></li>
            <li><a href="agricultural-licence.php"><i class="fas fa-file-alt"></i> Agricultural Licence</a></li>
            <li><a href="agricultural-machinery.php"><i class="fas fa-cogs"></i> Agricultural Machinery</a></li>
            <li><a href="agricultural-produces.php"><i class="fas fa-warehouse"></i> Agricultural Produces</a></li>
            <li><a href="crops.php"><i class="fas fa-seedling"></i> Crops</a></li>
            <li><a href="fertilizers-pesticides.php"><i class="fas fa-spray-can"></i> Fertilizers & Pesticides</a></li>
            <li><a href="irrigation.php"><i class="fas fa-tint"></i> Irrigation</a></li>
            <li><a href="organic-farming.php"><i class="fas fa-leaf"></i> Organic Farming</a></li>
            <li><a href="plant-protection.php"><i class="fas fa-shield-alt"></i> Plant Protection</a></li>
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <div class="main-content" id="mainContent">
        <header class="antique-header">
            <div class="container">
                <h1>Welcome to Farming Hub</h1>
            </div>
        </header>

        <section class="seed-products">
            <div class="container">
                <h2>Our Seed Products</h2>
                <p>Discover a wide range of high-quality seeds designed to boost your yield and ensure a successful harvest.</p>

                <div class="product-grid">
                    <div class="product-item">
                        <img src="images/download15.jfif" alt="Wheat Seeds">
                        <h3>Wheat Seeds</h3>
                        <p>High-yielding wheat seeds suitable for various climates. Ensure a bountiful harvest with our premium seeds.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download16.jfif" alt="Corn Seeds">
                        <h3>Corn Seeds</h3>
                        <p>Grow robust and healthy corn plants with our specially selected seeds. Perfect for large-scale farming.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download17.jfif" alt="Rice Seeds">
                        <h3>Rice Seeds</h3>
                        <p>Our rice seeds are bred for high productivity and resistance to common pests and diseases.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download18.jfif" alt="Soybean Seeds">
                        <h3>Soybean Seeds</h3>
                        <p>Enhance your soybean crop with our top-quality seeds, known for their high germination rate.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download19.jfif" alt="Barley Seeds">
                        <h3>Barley Seeds</h3>
                        <p>Premium barley seeds ideal for brewing and animal feed. High yield and excellent quality.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download20.jfif" alt="Oats Seeds">
                        <h3>Oats Seeds</h3>
                        <p>Nutritious oats seeds for both human consumption and animal feed. Great for various soil types.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download1.jfif" alt="Sunflower Seeds">
                        <h3>Sunflower Seeds</h3>
                        <p>Bright and vibrant sunflower seeds that are perfect for ornamental and agricultural use.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download2.jfif" alt="Pumpkin Seeds">
                        <h3>Pumpkin Seeds</h3>
                        <p>High-quality pumpkin seeds for large and healthy pumpkins. Suitable for various climates.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download3.jfif" alt="Cucumber Seeds">
                        <h3>Cucumber Seeds</h3>
                        <p>Fast-growing cucumber seeds with high yield and resistance to common diseases.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download4.jfif" alt="Tomato Seeds">
                        <h3>Tomato Seeds</h3>
                        <p>Robust tomato seeds for delicious and juicy tomatoes. Ideal for home gardens and farms.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download5.jfif" alt="Pepper Seeds">
                        <h3>Pepper Seeds</h3>
                        <p>Variety of pepper seeds for both mild and hot peppers. Perfect for various cooking needs.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download6.jfif" alt="Lettuce Seeds">
                        <h3>Lettuce Seeds</h3>
                        <p>Fresh and crisp lettuce seeds for a healthy and vibrant garden. Suitable for all seasons.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download7.jfif" alt="Carrot Seeds">
                        <h3>Carrot Seeds</h3>
                        <p>High-quality carrot seeds for sweet and crunchy carrots. Ideal for both garden and commercial use.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download8.jfif" alt="Beetroot Seeds">
                        <h3>Beetroot Seeds</h3>
                        <p>Nutritious beetroot seeds that grow well in a variety of soil conditions.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download9.jfif" alt="Radish Seeds">
                        <h3>Radish Seeds</h3>
                        <p>Quick-growing radish seeds perfect for a fast harvest. Ideal for urban and rural gardens.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download10.jfif" alt="Squash Seeds">
                        <h3>Squash Seeds</h3>
                        <p>Delicious and versatile squash seeds for a variety of dishes. Great for home gardening.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download11.jfif" alt="Melon Seeds">
                        <h3>Melon Seeds</h3>
                        <p>Sweet and juicy melon seeds for a refreshing fruit crop. Suitable for warm climates.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download12.jfif" alt="Herb Seeds">
                        <h3>Herb Seeds</h3>
                        <p>Wide range of herb seeds for culinary and medicinal use. Perfect for herb gardens.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download13.jfif" alt="Sweetcorn Seeds">
                        <h3>Sweetcorn Seeds</h3>
                        <p>High-quality sweetcorn seeds for sweet and tender corn on the cob. Great for summer gardens.</p>
                    </div>
                    <div class="product-item">
                        <img src="images/download14.jfif" alt="Bean Seeds">
                        <h3>Bean Seeds</h3>
                        <p>Healthy and productive bean seeds for a variety of dishes. Suitable for many growing conditions.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer antique-footer">
            <div class="container">
                <p>&copy; 2024 Farming info. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        function toggleMenu() {
            var sideNav = document.getElementById('sideNav');
            var mainContent = document.getElementById('mainContent');
            sideNav.classList.toggle('open');
            mainContent.classList.toggle('shifted');
        }
    </script>
</body>

</html>