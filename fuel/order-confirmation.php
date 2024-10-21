<?php
session_start(); // Start the session to access session variables

if (!isset($_SESSION['orderId'])) {
    // If there's no orderId, redirect back to the payment page or show an error
    header("Location: payment.php");
    exit();
}

// Connect to the database
include 'connect.php';

// Fetch order details from the database
$orderId = $_SESSION['orderId'];
$sql = "SELECT fuelType, orderDate, orderTime, customerName, customerPhone, deliveryAddress FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$stmt->bind_result($fuelType, $orderDate, $orderTime, $customerName, $customerPhone, $deliveryAddress);
$stmt->fetch();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body { font-family: 'Roboto', sans-serif; background-color: #f8f9fa; color: #333; }
        .container { padding-top: 100px; }
        .footer { text-align: center; padding: 20px 0; background-color: #f8f9fa; color: #333; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Confirmation</h2>
        <div class="alert alert-success" role="alert">
            Order placed successfully!
        </div>
        <p>Order Number: <strong><?php echo $orderId; ?></strong></p>
        <p>Fuel Type: <?php echo $fuelType; ?></p>
        <p>Delivery Date: <?php echo $orderDate; ?></p>
        <p>Delivery Time: <?php echo $orderTime; ?></p>
        <p>Customer Name: <?php echo $customerName; ?></p>
        <p>Phone: <?php echo $customerPhone; ?></p>
        <p>Delivery Address: <?php echo $deliveryAddress; ?></p>

        <!-- Button to track order -->
        <a href="track-order.php?orderId=<?php echo $orderId; ?>" class="btn btn-primary">Track Order</a>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Fuel Order. All rights reserved.</p>
    </footer>
</body>
</html>