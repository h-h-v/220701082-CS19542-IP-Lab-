<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "220701082";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["rn"])) {
    $rn = $_GET["rn"];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM sd WHERE rno = ?");
    $stmt->bind_param("i", $rn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Roll Number: " . $row["rno"] . " - Name: " . $row["name"] . " - Dept: " . $row["dept"] . " - Year: " . $row["yr"] . "<br>";
        }
    } else {
        echo "No results found.";
    }

    $stmt->close();
    $conn->close();
    exit(); // Stop further processing as we have returned the result for the AJAX call.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student DB Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();  // Prevent the default form submission
                var rn = $('#rollNumber').val();  // Get the roll number input value

                $.ajax({
                    url: '',  // Empty string means the current file (index.php)
                    type: 'GET',
                    data: { rn: rn },
                    success: function(response) {
                        $('#result').html(response);  // Display the result in the "result" div
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Student DB Search</h1>
    <form id="searchForm">
        <input type="text" id="rollNumber" placeholder="Enter Roll Number" name="rn" required>
        <button type="submit">Search</button>
    </form>

    <div id="result"></div> <!-- Div to display the results -->
</body>
</html>