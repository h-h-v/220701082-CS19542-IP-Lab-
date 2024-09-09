<?php
include "access.php";

$id = $_GET["Id"];
$f = $_GET["fund"];

// Correct the SQL syntax for updating the balance
$sql = "UPDATE User SET bal = bal + $f WHERE id = $id"; // Ensure the query is properly formed

// Execute the update query
$conn->query($sql);

// Correct SQL query for fetching user data
$sql2 = "SELECT * FROM User WHERE id = $id";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Properly embed the email and password in the hidden form field
    echo "<form action='trans.php' method='POST'>
        <input type='hidden' name='mail' value='" .
        htmlspecialchars($row["email"]) .
        "'>
        <input type='hidden' name='pass' value='" .
        htmlspecialchars($row["password"]) .
        "'>
    </form>";
    // Correct the header syntax to pass both email and password properly
    header(
        "Location: trans.php?mail=" .
            urlencode($row["email"]) .
            "&pass=" .
            urlencode($row["password"])
    );
    exit(); // Prevent further script execution after the redirect
} else {
    echo "User not found";
}
?>
