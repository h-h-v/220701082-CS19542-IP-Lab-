<?php
include "access.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e0e0e0;
            padding: 15px 30px;
            color: #353e43;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .navbar nav {
            display: flex;
            gap: 20px;
        }
        .navbar nav a {
            color: #353e43;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .navbar nav a:hover {
            color: #1a2e3c;
        }
        .main-content {
            padding: 20px;
        }
        h1 {
            font-size: 50px;
            color: DarkSlateGrey;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            font-size: 20px;
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            height: 40px;
            width: calc(100% - 20px);
            margin-bottom: 20px;
            padding: 0 10px;
            font-size: 18px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #2e3b4e;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 20px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #1a2e3c;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <span style="color: green; font-size: 30px"></span> Dingus Bank
        </div>
        <nav>
            <a href="home.html">Home</a>
            <a href="index.php">Register</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Login</h1>
        <h1></h1>
        <form action="trans.php" method="GET">
            <label for="mail">Email:</label>
            <input type="email" id="mail" placeholder="Email" name="mail" required>
            <label for="pass">Password:</label>
            <input type="password" id="pass" placeholder="Password" name="pass" required>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
