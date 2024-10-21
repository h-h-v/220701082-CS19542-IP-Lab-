<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }
        .navbar {
            background-color: #ffffff;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #000000 !important;
        }
        .container {
            padding-top: 50px;
        }
        .order-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: #fff;
            margin-top: 20px;
        }
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
        /* Custom Marker Style */
        .leaflet-marker-icon {
            border-radius: 50%;
            background-color: #007bff;
            border: 2px solid #fff;
        }
        .eta-text {
            margin-top: 10px;
            font-size: 1.1rem;
            color: #007bff;
            font-weight: bold;
        }
        body, p, ul, address, a {
    margin: 0;
    padding: 0;
    text-decoration: none;
  }
  
  footer {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    background-color: white;
    padding: 50px 0;
    color: #000;
  }
  
  .footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .footer-left, .footer-right {
    flex: 1;
    max-width: 45%;
  }
  
  .footer-left {
    padding-right: 20px;
  }
  
  .footer-right {
    padding-left: 20px;
  }
  
  address p {
    font-size: 1em;
    line-height: 1.6;
  }
  
  .social-links {
    list-style: none;
    margin: 20px 0;
  }
  
  .social-links li {
    margin-bottom: 8px;
  }
  
  .social-links a {
    color: #000;
    font-size: 1em;
    transition: color 0.3s ease;
  }
  
  .social-links a:hover {
    color: #555;
  }
  
  .contact-info p {
    font-size: 1em;
    line-height: 1.6;
  }
  
  .contact-info a {
    color: #000;
    font-weight: bold;
  }
  
  .newsletter-form {
    width: 100%;
  }
  
  .newsletter-form label {
    font-size: 1.4em;
    margin-bottom: 15px;
    display: block;
  }
  
  .newsletter-input {
    display: flex;
    width: 100%;
    border-radius: 50px;
    overflow: hidden;
  }
  
  .newsletter-input input {
    flex: 1;
    padding: 15px 20px;
    border: 1px solid #eaeaea;
    background-color: #f8f8f8;
    font-size: 1em;
  }
  
  .newsletter-input input:focus {
    background-color: #fff;
    outline: none;
  }
  
  .newsletter-input button {
    padding: 0 20px;
    border: none;
    background-color: #000;
    color: #fff;
    font-size: 1.2em;
    cursor: pointer;
  }
  
  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    font-size: 0.9em;
    max-width: 1200px;
    margin: 40px auto 0 auto;
  }
  
  .footer-bottom p, .footer-bottom a {
    color: #555;
  }
  
  .footer-bottom a {
    color: #000;
    text-decoration: underline;
  }
  
  .footer-bottom span {
    color: red;
  }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
        <img src="images/jp.png" alt="Fuel Order Logo">
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
                <a class="nav-link" href="admin.php">Back to Dashboard</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Order Details</h2>
    <div class="order-details">
        <?php
        include 'connect.php';
        $orderId = $_GET['id'];
        $sql = "SELECT * FROM orders WHERE id = $orderId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Order ID:</strong> " . $row['id'] . "</p>";
            echo "<p><strong>Fuel Type:</strong> " . $row['fuelType'] . "</p>";
            echo "<p><strong>Order Date:</strong> " . $row['orderDate'] . "</p>";
            echo "<p><strong>Order Time:</strong> " . $row['orderTime'] . "</p>";
            echo "<p><strong>ETA:</strong> " . $row['eta'] . "</p>";
            echo "<p><strong>Customer Name:</strong> " . $row['customerName'] . "</p>";
            echo "<p><strong>Customer Phone:</strong> " . $row['customerPhone'] . "</p>";
            echo "<p><strong>Delivery Address:</strong> " . $row['deliveryAddress'] . "</p>";
            
            // Dummy data for latitude and longitude if not available
            $customerLat = isset($row['customerLatitude']) ? $row['customerLatitude'] : '37.7749'; // Default: San Francisco
            $customerLng = isset($row['customerLongitude']) ? $row['customerLongitude'] : '-122.4194'; // Default: San Francisco
            $deliveryLat = isset($row['deliveryPersonLatitude']) ? $row['deliveryPersonLatitude'] : '37.7749'; // Default: San Francisco
            $deliveryLng = isset($row['deliveryPersonLongitude']) ? $row['deliveryPersonLongitude'] : '-122.4194'; // Default: San Francisco
            
            echo "<p><strong>Customer Location:</strong> Lat: " . $customerLat . ", Lng: " . $customerLng . "</p>";
            echo "<p><strong>Delivery Person Location:</strong> Lat: " . $deliveryLat . ", Lng: " . $deliveryLng . "</p>";
        } else {
            echo "<p>No order found with ID: $orderId</p>";
        }
        $conn->close();
        ?>
        
        <!-- Leaflet Map Container -->
        <div id="map"></div>
        <!-- ETA Text -->
        <p class="eta-text">Estimated Time of Arrival: 15 minutes</p>
    </div>
</div>

<footer id="ft">
  <div class="footer-container">
    <div class="footer-left">
      <address>
        <p>1600</p>
        <p>Amphitheatre Parkway</p>
        <p>Palo Alto</p>
        <p>CA 94303</p>
      </address>
      <ul class="social-links">
        <li><a href="#">Twitter / X</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">LinkedIn</a></li>
      </ul>
      <div class="contact-info">
        <p>General enquiries: <a href="mailto:220701082@rajalakshmi.edu.in">220701082@rajalakshmi.edu.in</a></p>
        <p>New business: <a href="mailto:hariharaviswanathan@gmail.com">hariharaviswanathan@gmail.com</a></p>
      </div>
    </div>

    <div class="footer-right">
      <form action="#" method="post" class="newsletter-form">
        <label for="email">Subscribe to our newsletter</label>
        <div class="newsletter-input">
          <input type="email" id="email" name="email" placeholder="Your email" required>
          <button type="submit">&#8594;</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy;2024 JUICE UP</p>
    <p>R&D: <a href="https://ju.co">j.u.co</a></p>
    <p>Built by h-h-v <span>&#128293;</span></p>
  </div>
</footer>

<!-- Leaflet.js -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Fetch customer and delivery person coordinates from PHP variables
    var customerLat = parseFloat(<?php echo json_encode($customerLat); ?>);
    var customerLng = parseFloat(<?php echo json_encode($customerLng); ?>);
    var deliveryLat = parseFloat(<?php echo json_encode($deliveryLat); ?>);
    var deliveryLng = parseFloat(<?php echo json_encode($deliveryLng); ?>);

    // Initialize the map centered on the customer's location
    var map = L.map('map').setView([customerLat, customerLng], 13);

    // Use CartoDB Dark Matter Tile Layer (No API key needed)
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors & CartoDB',
        maxZoom: 18
    }).addTo(map);

    // Custom Icons for Uber-like marker
    var customerIcon = L.icon({
        iconUrl: 'images/customer-marker.png', // Add custom image for the marker
        iconSize: [30, 30],
        iconAnchor: [15, 30]
    });

    var deliveryIcon = L.icon({
        iconUrl: 'images/delivery-marker.png', // Add custom image for the marker
        iconSize: [30, 30],
        iconAnchor: [15, 30]
    });

    // Add a marker for the customer location
    var customerMarker = L.marker([customerLat, customerLng], { icon: customerIcon }).addTo(map)
        .bindPopup('Customer Location').openPopup();

    // Add a marker for the delivery person's location
    var deliveryMarker = L.marker([deliveryLat, deliveryLng], { icon: deliveryIcon }).addTo(map)
        .bindPopup('Delivery Person Location');

    // Add a polyline to represent the route between customer and delivery person
    var latlngs = [
        [customerLat, customerLng],
        [deliveryLat, deliveryLng]
    ];
    var polyline = L.polyline(latlngs, { color: '#007bff', weight: 4 }).addTo(map);

    // Fit the map bounds to include both markers and the route
    map.fitBounds(polyline.getBounds());
</script>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>