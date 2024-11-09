<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information for Gujarat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            position: relative; /* Make sure to set relative positioning for the container */
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        form {
            margin-bottom: 20px;
            position: relative;
            width: 320px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #0072ff;
            width: 100%;
        }

        .suggestions {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
            z-index: 100;
        }

        .suggestions li {
            padding: 10px;
            cursor: pointer;
            list-style-type: none;
        }

        .suggestions li:hover {
            background-color: #0072ff;
            color: #fff;
        }

        button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #0072ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #005bb5;
        }

        .weather-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }

        .weather-container h3 {
            color: #0072ff;
            margin-bottom: 10px;
        }

        .weather-container p {
            margin: 5px 0;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        /* New CSS for the 'Go to Home' button */
        .home-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: white;
            color: darkblue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: black;
        }
    </style>
</head>
<body>

    <!-- 'Go to Home' button -->
    <a href="farminghome.php" class="home-button">Go to Home</a>

    <h1>Weather Information for Cities in Gujarat</h1>

    <!-- Search form -->
    <form method="get" action="">
        <input type="text" id="city-search" name="search-city" placeholder="Enter city name" oninput="showSuggestions(this.value)">
        <ul id="suggestions" class="suggestions"></ul>
        <button type="submit">Search</button>
    </form>

    <?php
    set_time_limit(60); 
    // Your API key from OpenWeatherMap
    $apiKey = "252cdf35302130b954830a916bfbd8e9";

    // Default cities in Gujarat
    $cities = ["Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar", "Jamnagar", "Junagadh", "Gandhinagar", "Anand", "Bharuch", "Dahod", "Bhuj", "Kheda", "Nadiad", "Navsari", "Patan", "Dang", "Porbandar", "Surendranagar", "Morbi", "Amreli", "Botad", "Palanpur", 
    "Modasa", "Veraval", "Vapi", "Valsad", "Godhra", "Deesa", "Mahuva", "Gondal", "Unjha", "Kalol", "Visnagar", "Mangrol", "Mandvi",
    "Dholka", "Borsad", "Khambhat", "Viramgam", "Petlad", "Sanand", "Dabhoi",
    "Halol", "Umreth", "Bayad", "Tharad", "Idar", "Savarkundla",
    "Mahudha", "Matar", "Anklav", "Kadi", "Mansa", "Kalavad", 
    "Padra", "Karjan", "Kosamba", "Vijapur", "Bhanvad", "Visavadar", "Dhrol",
    "Radhanpur", "Bhachau", "Bhuj", "Mundra",  
    "Rapar", "Wankaner", "Morbi", "Halvad", "Dhrangadhra", "Surajkaradi", 
    "Gadhda", "Sihor", "Talaja", "Gariadhar", "Palitana", "Dhoraji", "Jetpur", 
    "Upleta", "Manavadar", "Keshod", "Mangrol", "Maliya", "Una", "Kodinar", 
    "Bhachau", "Anjar", "Rapar"];

    // Check if a search query is provided
    if (isset($_GET['search-city']) && !empty($_GET['search-city'])) {
        $searchCity = htmlspecialchars($_GET['search-city']);
        $cities = [$searchCity]; // Only show the searched city
    }

    foreach ($cities as $city) {
        // API URL to fetch data
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        // Fetch the weather data
        $response = file_get_contents($apiUrl);

        // Decode the JSON response into a PHP array
        $weatherData = json_decode($response, true);

        // Check if the API request was successful
        if ($weatherData['cod'] == 200) {
            // Extract relevant data
            $temperature = $weatherData['main']['temp'];
            $weatherDescription = $weatherData['weather'][0]['description'];
            $humidity = $weatherData['main']['humidity'];
            $windSpeed = $weatherData['wind']['speed'];

            // Display the weather information
            echo "<div class='weather-container'>";
            echo "<h3>Weather in {$city}</h3>";
            echo "<p>Temperature: {$temperature}°C</p>";
            echo "<p>Description: {$weatherDescription}</p>";
            echo "<p>Humidity: {$humidity}%</p>";
            echo "<p>Wind Speed: {$windSpeed} m/s</p>";
            echo "</div>";
        } else {
            // If there was an error, display an error message
            echo "<div class='weather-container'>";
            echo "<h3>Weather in {$city}</h3>";
            echo "<p>Unable to fetch weather data. Please try again later.</p>";
            echo "</div>";
        }
    }
    ?>

    <script>
        const cities = [
            "Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar", "Jamnagar", "Junagadh", "Gandhinagar", "Anand", "Bharuch", 
            "Dahod", "Bhuj", "Kheda", "Nadiad", "Navsari", "Patan", "Dang", "Porbandar", "Surendranagar", "Morbi", "Amreli", 
            "Botad", "Palanpur", "Modasa", "Veraval", "Vapi", "Valsad", "Godhra", "Deesa", "Mahuva", "Gondal", "Unjha", 
            "Kalol", "Visnagar", "Mangrol", "Mandvi", "Dholka", "Borsad", "Khambhat", "Viramgam", "Petlad", "Sanand", 
            "Dabhoi", "Halol", "Umreth", "Bayad", "Tharad", "Idar", "Savarkundla", "Mahudha", "Matar", "Anklav", "Kadi", 
            "Mansa", "Kalavad", "Padra", "Karjan", "Kosamba", "Vijapur", "Bhanvad", "Visavadar", "Dhrol", "Radhanpur", 
            "Bhachau", "Bhuj", "Mundra", "Rapar", "Wankaner", "Morbi", "Halvad", "Dhrangadhra", "Surajkaradi", "Gadhda", 
            "Sihor", "Talaja", "Gariadhar", "Palitana", "Dhoraji", "Jetpur", "Upleta", "Manavadar", "Keshod", "Mangrol", 
            "Maliya", "Una", "Kodinar", "Bhachau", "Anjar", "Rapar"
        ];

        function showSuggestions(value) {
            const suggestions = document.getElementById('suggestions');
            suggestions.innerHTML = '';

            if (value.length === 0) {
                return;
            }

            const filteredCities = cities.filter(city => city.toLowerCase().startsWith(value.toLowerCase()));

            filteredCities.forEach(city => {
                const li = document.createElement('li');
                li.textContent = city;
                li.onclick = () => {
                    document.getElementById('city-search').value = city;
                    suggestions.innerHTML = '';
                };
                suggestions.appendChild(li);
            });
        }
    </script>

</body>
</html>
