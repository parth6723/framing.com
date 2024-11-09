<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irrigation</title>
    <link rel="stylesheet" href="irrigation.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Irrigation</h2>
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
                <h1>Irrigation</h1>

            </div>
        </header>

        <h2>Purpose</h2>
        <p>Irrigation is the process of applying water to crops at the right time and in the right amount to help them grow and develop. It's used to increase crop productivity and profitability, and to help crops grow in arid regions and in humid regions where there isn't enough rain during the growing season.</p>

        <h2>Sources of Water</h2>
        <p>Irrigation water can come from various sources:</p>
        <ul>
            <li><strong>Groundwater:</strong> Extracted from wells, springs, or borings.</li>
            <li><strong>Surface Water:</strong> Comes from streams, lakes, or reservoirs.</li>
            <li><strong>Non-conventional Sources:</strong> Includes treated wastewater, desalinated water, or drainage water.</li>
        </ul>

        <h2>Methods</h2>
        <p>There are many different types of irrigation methods, including:</p>
        <ul>
            <li><strong>Flood Irrigation:</strong> Water is allowed to flow over the entire field.</li>
            <li><strong>Furrow Irrigation:</strong> Water is applied in furrows or channels between crop rows.</li>
            <li><strong>Border Irrigation:</strong> Fields are divided into borders or strips, and water is applied to each border.</li>
        </ul>

        <h2>Efficiency</h2>
        <p>Irrigation is most efficient when it provides the right amount of water to the right plants, and prevents water from being lost to weeds or evaporation.</p>

        <h2>History</h2>
        <p>Notable historical irrigation systems include:</p>
        <ul>
            <li><strong>Dujiangyan Irrigation System:</strong> Built in ancient China in 256 BCE to irrigate a large area of farmland.</li>
            <li><strong>Terrace Irrigation:</strong> Used in pre-Columbian America, India, China, and early Syria.</li>
        </ul>

        <h2>Canal Systems</h2>
        <p>In the 14th century, Firoz Shah Tughlaq built a large canal irrigation system in northern India. The British later built colonial canal networks on these medieval systems.</p>
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