<?php
include 'connect.php';
$orderId = $_GET['id'];
$sql = "SELECT * FROM orders WHERE id = $orderId";
$result = $conn->query($sql);
$order = [];

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
}
echo json_encode($order);
$conn->close();
?>