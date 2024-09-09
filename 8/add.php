<?php
include "access.php";
$id = $_GET["Id"] ?? "";
$query = "SELECT * FROM User WHERE Id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Application - Transact</title>
    <style>
    .logo {
        font-size: 24px;
        font-weight: bold;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            font-size: 50px;
            color: #2f4f4f;
            text-align: center;
            margin: 20px 0;
        }
        nav {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            background-color: #e0e0e0;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        nav a {
            color: #333;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #0056b3;
        }
        form {
            font-size: 20px;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"] {
            height: 40px;
            width: calc(100% - 22px);
            padding: 0 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        select {
            height: 40px;
            width: 100%;
            padding: 0 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <span style="color: green; font-size: 30px"></span> Dingus Bank
        </div>
        <a href="index.php">Home</a>
        <a href="trans.php?Id=<?php echo htmlspecialchars(
            $row["Id"],
            ENT_QUOTES,
            "UTF-8"
        ); ?>">Transact</a>
        <a href="login.php">Login</a>
    </nav>
    <form action="update1.php" method="GET">
        <input type='hidden' name='Id' value='<?php echo htmlspecialchars(
            $row["Id"],
            ENT_QUOTES,
            "UTF-8"
        ); ?>'>
        <label for="fund">Enter Funds</label>
        <input type="text" id="fund" placeholder="Amount" name="fund">
        <br/>
        <label for="accountType">Account Type</label>
        <select id="accountType" name="accountType">
            <option value="savings">Savings Account</option>
            <option value="current">Current Account</option>
        </select>
        <br/>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
