<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crops</title>
    <link rel="stylesheet" href="crops.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Crops</h2>
            <button class="menu-toggle"><i class="fas fa-times"></i></button>
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
    </div>

    <div class="main-content">
        <header class="antique-header">
            <div class="container">
                <h1>Crops Info</h1>
            </div>
        </header>



        <section class="info-points">
            <div class="container">
                <h2>Here are some details about crops:</h2>
                <ul>
                    <li><b>Types of crops</b></li>
                    <p>Crops can be categorized into six types based on their use: food, feed, fiber, oil, ornamental, and industrial. </p>
                    <li><b>Some examples of crops</b></li>
                    <p>Some examples of crops include wheat, corn, rice, potatoes, cassava, soybeans, sweet potatoes, and sorghum. </p>
                    <li><b> Crop cultivation</b>
                        <p> Crop cultivation depends on the weather and soil conditions.
                        </p>
                    </li>
                    <li> <b> Kharif crops</b>
                        <p> These crops are planted during the monsoon season and include rice, sugarcane, jute, cotton, and vegetables. They require a lot of water and hot temperatures to grow.
                        </p>
                    </li>
                    <li><b>Zaid crops </b>
                        <p> These crops are grown during the short summer season between the rabi and kharif seasons. Examples of Zaid crops include potatoes and oilseeds like soybean and sunflower.
                        </p>
                    </li>
                    <li><b> Maize </b>
                        <p> This is the third most important cereal crop in India after rice and wheat. It's used for human food and animal feed, and is also used in the corn starch industry and baby corn production.
                        </p>
                    </li>
                    <li><b>       Pulses</b>
                 <p>   Also known as grain legumes, pulses include dry beans, dry peas, chickpeas, and lentils. They are high in protein and fiber.
                 </p></li>
                </ul>
            </div>
        </section>



        <footer class="antique-footer">
            <div class="container">
                <p>&copy; 2024 Farming Info. All rights reserved.</p>
                <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </footer>
    </div>

    <script>
        // JavaScript for toggle menu
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.side-nav').classList.toggle('open');
            document.querySelector('.main-content').classList.toggle('shifted');
        });
    </script>
</body>

</html>