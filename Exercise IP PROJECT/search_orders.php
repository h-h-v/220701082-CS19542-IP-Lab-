<?php
include 'connect.php';

// Get search term from POST request
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

// Prepare the SQL statement with a LIKE clause to search
$sql = "SELECT * FROM orders WHERE customerName LIKE ? OR customerPhone LIKE ?";
$stmt = $conn->prepare($sql);
$searchTermWithWildcards = '%' . $searchTerm . '%';
$stmt->bind_param("ss", $searchTermWithWildcards, $searchTermWithWildcards);
$stmt->execute();
$result = $stmt->get_result();

// Generate the table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['customerName'] . "</td>";
        echo "<td>" . $row['customerPhone'] . "</td>";
        echo "<td>" . $row['fuelType'] . "</td>";
        echo "<td>" . $row['orderDate'] . "</td>";
        echo "<td>" . $row['orderTime'] . "</td>";
        echo "<td>" . $row['eta'] . "</td>";
        echo "<td>" . $row['deliveryAddress'] . "</td>";
        echo "<td><a href='order-details.php?id=" . $row['id'] . "' class='btn-view'>Track</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No orders found.</td></tr>";
}

$stmt->close();
$conn->close();
?>