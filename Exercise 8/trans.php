<?php
include "access.php";

// Initialize variables
$user_name = "Guest";
$user_bal = 0;
$error_message = "";

// Retrieve email and password from GET parameters
$mail = $_GET["mail"] ?? "";
$pass = $_GET["pass"] ?? "";

// Sanitize inputs to prevent SQL injection
$mail = $conn->real_escape_string($mail);
$pass = $conn->real_escape_string($pass);

// Query to get user information
$query = "SELECT * FROM User WHERE email='$mail'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name = htmlspecialchars($row["name"], ENT_QUOTES, "UTF-8");
    $user_bal = htmlspecialchars($row["bal"], ENT_QUOTES, "UTF-8");
    $user_id = htmlspecialchars($row["Id"], ENT_QUOTES, "UTF-8");
} else {
    $error_message = "No user found with the provided email.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Dashboard</title>
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
            margin-top: 20px;
        }
        .header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            font-size: 28px;
            margin: 0;
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #333;
        }
        .card h3 {
            font-size: 18px;
            margin-top: 0;
            color: #666;
        }
        .card .amount {
            font-size: 24px;
            font-weight: bold;
        }
        .card .icon {
            font-size: 30px;
            color: #2e3b4e;
        }
        .card .chart {
            height: 200px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .card .chart canvas {
            width: 100%;
            height: 100%;
        }
        .buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .buttons a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .buttons a:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <span style="color: green; font-size: 30px"></span> Dingus Bank
        </div>
        <nav>
            <a href="home.html">Home</a>
            <a href="login.php">Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars(
                $user_name,
                ENT_QUOTES,
                "UTF-8"
            ); ?></h1>
        </div>

        <div class="dashboard">
            <!-- Card 1 -->
            <div class="card">
                <i class="fas fa-dollar-sign icon"></i>
                <h3>Total Balance</h3>
                <p class="amount">$<?php echo number_format(
                    $user_bal,
                    2
                ); ?></p>
                <div class="chart">
                    <canvas id="balanceChart1"></canvas>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <i class="fas fa-credit-card icon"></i>
                <h3>Credit Card Balance</h3>
                <p class="amount">$2,345</p>
                <div class="chart">
                    <canvas id="balanceChart2"></canvas>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <i class="fas fa-suitcase icon"></i>
                <h3>Investment Portfolio</h3>
                <p class="amount">$7,890</p>
                <div class="chart">
                    <canvas id="balanceChart3"></canvas>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card">
                <i class="fas fa-chart-line icon"></i>
                <h3>Monthly Expenses</h3>
                <p class="amount">$1,234</p>
                <div class="chart">
                    <canvas id="balanceChart4"></canvas>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="buttons">
            <a href="add.php?Id=<?php echo htmlspecialchars(
                $user_id,
                ENT_QUOTES,
                "UTF-8"
            ); ?>">Add Funds</a>
            <a href="transfer.php?Id=<?php echo htmlspecialchars(
                $user_id,
                ENT_QUOTES,
                "UTF-8"
            ); ?>">Transfer Funds</a>
        </div>
    </div>

    <script>
        // Example chart initialization using Chart.js
        var ctx1 = document.getElementById('balanceChart1').getContext('2d');
        var balanceChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Total Balance',
                    data: [1200, 1500, 1700, 1600, 1800],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('balanceChart2').getContext('2d');
        var balanceChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Credit Card Balance',
                    data: [200, 300, 400, 350, 500],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById('balanceChart3').getContext('2d');
        var balanceChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Investment Portfolio',
                    data: [3000, 3200, 3400, 3600, 3800],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx4 = document.getElementById('balanceChart4').getContext('2d');
        var balanceChart4 = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Monthly Expenses',
                    data: [400, 500, 600, 550, 700],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
