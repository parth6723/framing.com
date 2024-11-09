<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>plant-protection</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Plant Protection</h2>
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
            <h1>Plant Protection</h1>
            </div>
        </header>

      
    <h2>Plant Protection Strategies</h2>
    <p>Plant protection strategies include physical and chemical methods, and depend on the type of crop being grown and the threat. The goal is to protect crops from diseases, insects, and weeds.</p>
    
    <h2>Plant Protection and the International Plant Protection Convention</h2>
    <p>The International Plant Protection Convention (IPPC) is an intergovernmental treaty that aims to protect plants, agricultural products, and natural resources from pests. The IPPC develops and promotes International Phytosanitary Measures (ISPMs) to safeguard food security, trade, and the environment.</p>
    
    <h2>Plant Protection and the Department of Agriculture and Farmers Welfare</h2>
    <p>The Department of Agriculture and Farmers Welfare in India provides information on plant protection, including:</p>
    <ul>
        <li><strong>Plant Quarantine:</strong> Measures to prevent the introduction of harmful pests and diseases.</li>
        <li><strong>Integrated Pest Management:</strong> Strategies for managing pest populations with minimal impact on the environment.</li>
        <li><strong>Insecticides:</strong> Chemicals used to control insect pests.</li>
        <li><strong>Locust Research:</strong> Studies focused on managing and controlling locust outbreaks.</li>
    </ul>
    
    <h2>Plant Protection and Modern Crop Protection Compounds</h2>
    <p>Modern crop protection compounds use digital solutions to analyze soil and plant conditions, and provide information about weather conditions. This helps farmers optimize resource use, protect crops, and minimize environmental damage.</p>

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