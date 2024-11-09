<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>organic-farming</title>
    <link rel="stylesheet" href="organic-farming.css">

</head>

<body>
    <div class="side-nav">
        <div class="nav-header">
            <h2>Organic Farming</h2>
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
            <h1>Organic Farming</h1>

            </div>
        </header>

    
    <p>Organic farming, also known as ecological farming or biological farming, is an agricultural system that uses fertilizers of organic origin such as compost manure, green manure, and bone meal and places emphasis on techniques such as crop rotation and companion planting. It originated early in the 20th century in reaction to rapidly changing farming practices. Certified organic agriculture accounts for 70 million hectares (170 million acres) globally, with over half of that total in Australia.</p>
    
    <h2>Techniques and Standards</h2>
    <p>Biological pest control, mixed cropping, and the fostering of insect predators are encouraged. Organic standards are designed to allow the use of naturally-occurring substances while prohibiting or strictly limiting synthetic substances. For instance:</p>
    <ul>
        <li><strong>Allowed:</strong> Naturally-occurring pesticides such as pyrethrin.</li>
        <li><strong>Prohibited:</strong> Synthetic fertilizers and pesticides, genetically modified organisms, nanomaterials, human sewage sludge, plant growth regulators, hormones, and antibiotic use in livestock husbandry.</li>
        <li><strong>Allowed (Synthetic Substances):</strong> Copper sulfate, elemental sulfur, and veterinary drugs.</li>
    </ul>
    
    <h2>Regulation and Growth</h2>
    <p>Organic agricultural methods are internationally regulated and legally enforced by transnational organizations (such as the European Union) and many nations, based in large part on the standards set by the International Federation of Organic Agriculture Movements (IFOAM), established in 1972. Organic agriculture strives for sustainability, the enhancement of soil fertility and biological diversity while, with rare exceptions, prohibiting synthetic pesticides, antibiotics, synthetic fertilizers, genetically modified organisms, and growth hormones.</p>
    
    <h2>Market and Expansion</h2>
    <p>Since 1990, the market for organic food and other products has grown rapidly, reaching $63 billion worldwide in 2012. This demand has driven a similar increase in organically managed farmland that grew from 2001 to 2011 at a compounding rate of 8.9% per year. As of 2022, approximately 96,000,000 hectares (240,000,000 acres) worldwide were farmed organically, representing approximately 2% of total world farmland.</p>
    
    <h2>Benefits and Drawbacks</h2>
    <p>Organic farming can be beneficial for biodiversity and environmental protection at the local level. However, because organic farming sometimes results in lower yields compared to intensive farming, additional agricultural land is needed elsewhere in the world. This can lead to the conversion of natural and forest land into agricultural land, potentially causing loss of biodiversity and negative climate effects that sometimes outweigh the local environmental gains achieved. This lower yield does not apply to dry lands.</p>
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