<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Weather App</title>
    <link rel="stylesheet" href="./style.css">
    <style>

        .weather-image {
         margin-bottom: 20px;
            }

         button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #6c5ce7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            }

    </style>
</head>
<body>
    <div class="container">
        <div class='weather-image'>
            <img width="200px" src="./weather-forecast.png" alt="">
        </div>
        

        <form method="POST" action="">
            <input type="text" name="location" placeholder="Enter a city..." required>
            <button type="submit">Search</button>
        </form>

        <?php
       
        $weather_data = [
            "Bangladesh" => ["temperature" => 28, "description" => "Sunny", "humidity" => 60, "wind_speed" => 15],
            "Germany" => ["temperature" => 18, "description" => "Cloudy", "humidity" => 70, "wind_speed" => 10],
            "England" => ["temperature" => 30, "description" => "Humid", "humidity" => 80, "wind_speed" => 20],
            "India" => ["temperature" => 22, "description" => "Partly Cloudy", "humidity" => 65, "wind_speed" => 12],
            "Thailand" => ["temperature" => 33, "description" => "Hot", "humidity" => 85, "wind_speed" => 8]
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $location = htmlspecialchars($_POST["location"]);

            if (array_key_exists($location, $weather_data)) {
                $temperature = $weather_data[$location]["temperature"];
                $description = $weather_data[$location]["description"];
                $humidity = $weather_data[$location]["humidity"];
                $wind_speed = $weather_data[$location]["wind_speed"];
            } else {
                $location = "Unknown";
                $temperature = "N/A";
                $description = "N/A";
                $humidity = "N/A";
                $wind_speed = "N/A";
                echo "<p class='error'>Weather data for the entered city is not available.</p>";
            }
        } else {
    
            $location = "Bangladesh";
            $temperature = $weather_data[$location]["temperature"];
            $description = $weather_data[$location]["description"];
            $humidity = $weather_data[$location]["humidity"];
            $wind_speed = $weather_data[$location]["wind_speed"];
        }

        echo "
        <div class='weather-box'>
            <h2>Weather in $location</h2>
            <p class='temperature'>$temperature</p>
            <p class='description'>$description</p>
            <p>Humidity: $humidity%</p>
            <p>Wind Speed: $wind_speed km/h</p>
        </div>";
        ?>

    </div>
</body>
</html>
