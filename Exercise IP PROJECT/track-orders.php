<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
        .container {
            padding-top: 50px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #000;
            color: #fff;
            margin-top: 20px;
        }
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="images/logo.png" alt="Fuel Order Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Track Your Order</h2>
    <div id="map"></div>
</div>
<footer class="footer">
    <p>&copy; 2024 Fuel Order. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script>
    var customerLocation = [12.9716, 77.5946]; // Example coordinates
    var deliveryLocation = [12.9352, 77.6245]; // Example coordinates

    var map = L.map('map').setView(customerLocation, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var customerMarker = L.marker(customerLocation).addTo(map)
        .bindPopup('Customer Location').openPopup();

    var deliveryMarker = L.marker(deliveryLocation).addTo(map)
        .bindPopup('Delivery Location').openPopup();

    var route = L.polyline([customerLocation, deliveryLocation], {color: 'red'}).addTo(map);

    // Example ETA
    L.DomUtil.create('div', 'eta', document.body).innerHTML = 'ETA: 15 mins';
</script>
</body>
</html>