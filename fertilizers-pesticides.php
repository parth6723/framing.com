<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Farming Information and Seed Products</title>
    <link rel="stylesheet" href="fertilizers-pesticides.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Fertilizers and Pesticides</h2>
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
            <h1>Fertilizers and Pesticides</h1>
            </div>
        </header>
      
    
    <h2>Fertilizers</h2>
    <p>Fertilizers are nutrients that are added to soil to help plants grow. They can be made from natural materials like animal or plant products, or they can be man-made. Fertilizers can be applied in the form of liquids, granules, or powders.</p>
    
    <h3>Types of Fertilizers</h3>
    <ul>
        <li><strong>Organic fertilizers:</strong> Such as compost and livestock manure, release nutrients slowly and increase soil quality.</li>
        <li><strong>Inorganic fertilizers:</strong> Such as urea, single super phosphate, and murate of potash, can be formulated to release nutrients at different speeds.</li>
    </ul>
    
    <h2>Pesticides</h2>
    <p>Pesticides are chemicals or biological agents that are used to kill, control, or deter pests. They can be toxic to humans and have a negative impact on non-targeted animals.</p>
    
    <h3>Types of Pesticides</h3>
    <ul>
        <li><strong>Pyrethroids:</strong> A synthetic version of pyrethrin, a naturally occurring pesticide found in chrysanthemums.</li>
    </ul>
    
    <h2>Benefits</h2>
    <p>Fertilizers and pesticides can help improve crop quality and productivity, and help meet global food demand.</p>
    
    <h2>Drawbacks</h2>
    <p>However, overuse of fertilizers and pesticides can have adverse effects on the environment and soil health:</p>
    <ul>
        <li><strong>Fertilizers:</strong> Can change soil's biochemical properties, decrease microbial populations, and lead to nutrient accumulation in waterways.</li>
        <li><strong>Pesticides:</strong> Can remain in soil for long periods, acidify soil, and form toxic transformation products.</li>
        <li><strong>Both:</strong> Can disrupt pollinators and natural pest-control mechanisms, and can impact farm worker health.</li>
    </ul>

        <footer class="antique-footer">
            <div class="container">
                <p>&copy; 2024 Farming Info. All rights reserved.</p>
                <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </footer>
    </div>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.side-nav').classList.toggle('open');
            document.querySelector('.main-content').classList.toggle('shifted');
        });
    </script>
</body>

</html>