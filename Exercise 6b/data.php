<?php
// Simulate a list of student names (you can replace this with a file read)
$students = [
    "Alice Johnson",
    "Bob Smith",
    "Charlie Brown",
    "David Wilson",
    "Eva Green",
    "Frank Wright",
    "Grace Lee",
    "Hannah Adams",
    "Isabella Garcia",
    "James Miller",
];

$query = isset($_GET["name"]) ? $_GET["name"] : "";

// Filter names based on the query
$filteredNames = array_filter($students, function ($name) use ($query) {
    return stripos($name, $query) !== false; // Case-insensitive match
});

// Return results as JSON
header("Content-Type: application/json");
echo json_encode(array_values($filteredNames));
?>
