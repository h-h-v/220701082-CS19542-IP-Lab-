<?php
include 'connect.php';
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
$orders = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
echo json_encode($orders);
$conn->close();
?>