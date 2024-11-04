<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            padding: 20px;
            max-width: 800px;
        }
        .status {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .step {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .step-number {
            width: 30px;
            height: 30px;
            background-color: #009a94;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }
        .step-content {
            flex-grow: 1;
        }
        #map {
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Track Your Order</h2>
        <div class="status">Order Status: <strong>On the way!</strong></div>

        <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">Order Received</div>
        </div>
        <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">Order Prepared</div>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">Order Dispatched</div>
        </div>
        <div class="step">
            <div class="step-number">4</div>
            <div class="step-content">Order Out for Delivery</div>
        </div>

        <div id="map"></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([51.505, -0.09], 13); // Default coordinates (latitude, longitude)

        // Set up the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Add a marker for the delivery driver
        var driverLat = 51.505; // Replace with actual driver latitude
        var driverLng = -0.09; // Replace with actual driver longitude
        var driverMarker = L.marker([driverLat, driverLng]).addTo(map);
        driverMarker.bindPopup("<b>Your Delivery Driver is Here!</b>").openPopup();

        // Optionally, add a circle to represent the delivery area
        var deliveryAreaCircle = L.circle([driverLat, driverLng], {
            color: 'blue',
            fillColor: '#30f',
            fillOpacity: 0.1,
            radius: 200
        }).addTo(map);
    </script>
</body>
</html>