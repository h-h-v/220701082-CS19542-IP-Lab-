<?php
session_start(); // Start the session

// Hardcoded credentials (you should replace this with database validation in production)
$valid_username = "admin";
$valid_password = "admin";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials
    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION["loggedin"] = true; // Set session if login is successful
        header("Location: admin.php"); // Redirect to the dashboard
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <nav>
    <img src="images/jp.png" alt="Fuel Order Logo">
</nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Juice Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Light background */
        }
        .login-container {
            max-width: 500px;
            margin: auto;
            padding: 2rem;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #37AFE1; /* Matching theme color */
        }
        .btn-primary {
            background-color: #37AFE1; /* Primary button color */
            border: none;
        }
        .btn-primary:hover {
            background-color: #28a745; /* Hover color */
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-container">
<a href="index.php">
    </a>
    <h2>Admin</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>