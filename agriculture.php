<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="side-nav" id="sideNav">
        <div class="nav-header">
            <h2>Agriculture</h2>
            <button class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></button>
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
                <h1>Agricultural</h1>
            </div>
        </header>

        <section class="hero antique-hero">
            <div class="container">
                <h2>Welcome to Agriculture Information </h2>
                <p>Agriculture, with its allied sectors, is unquestionably the largest livelihood provider in India, more so in the vast rural areas. It also contributes a significant figure to the Gross Domestic Product (GDP). Sustainable agriculture, in terms of food security, rural employment, and environmentally sustainable technologies such as soil conservation, sustainable natural resource management and biodiversity protection, are essential for holistic rural development. Indian agriculture and allied activities have witnessed a green revolution, a white revolution, a yellow revolution and a blue revolution.
                    This section provides the information on agriculture produces; machineries, research etc. Detailed information on the government policies, schemes, agriculture loans, market prices, animal husbandry, fisheries, horticulture, loans & credit, sericulture etc. is also available.</p>
            </div>
        </section>

        <section class="info-points">
            <div class="container">
                <h2>What We Offer</h2>
                <ul>
                    Agricultural Practices: Different methods and techniques used in farming, such as crop rotation, organic farming, and conservation tillage.

                    Agricultural Licenses: Information on various licenses required for farming activities, including pesticide application licenses and business licenses for agricultural enterprises.

                    Agricultural Machinery: Details about the equipment used in farming, from tractors to harvesters.

                    Crops and Livestock: Information on various types of crops and livestock, including best practices for cultivation and care.

                    Agricultural Research and Extension: Updates on new research and innovations in farming, as well as resources available for farmers.

                    Marketing and Prices: Strategies for selling agricultural products and understanding market prices.
                </ul>
            </div>
        </section>


        <footer class="antique-footer">
            <div class="container">
                <p>&copy; 2024 Farming Information and Seed Products. All rights reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </footer>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sideNav').classList.toggle('open');
            document.getElementById('mainContent').classList.toggle('shifted');
        });
    </script>
</body>

</html>