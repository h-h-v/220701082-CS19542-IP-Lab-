<?php
include 'connect.php';

// Ensure that 'fuelType', 'date', and 'time' are set
if (isset($_POST['fuelType']) && isset($_POST['date']) && isset($_POST['time'])) {
    $fuelType = htmlspecialchars($_POST['fuelType']);
    $orderDate = htmlspecialchars($_POST['date']);
    $orderTime = htmlspecialchars($_POST['time']);
    $customerName = htmlspecialchars($_POST['name']);       // Customer name
    $customerPhone = htmlspecialchars($_POST['phone']);     // Customer phone
    $deliveryAddress = htmlspecialchars($_POST['address']); // Delivery address

    // Prepare and execute the insert query using prepared statements
    $stmt = $conn->prepare("INSERT INTO orders (fuelType, orderDate, orderTime, customerName, customerPhone, deliveryAddress) 
                             VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fuelType, $orderDate, $orderTime, $customerName, $customerPhone, $deliveryAddress);

    if ($stmt->execute() === TRUE) {
        // Fetch the last inserted order ID
        $orderId = $stmt->insert_id; // Get the ID of the last inserted row

        // Start the session to use session variables for confirmation
        session_start();
        $_SESSION['orderId'] = $orderId;

        // Redirect to confirmation page
        header("Location: order-confirmation.php");
        exit(); // Make sure to exit after a redirect
    } else {
        echo "Error: " . $stmt->error; // Display error message
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();
?>