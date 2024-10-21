<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        .search-container {
            margin-bottom: 20px;
        }
        .btn-search {
            background-color: #000;
            color: white;
            padding: 10px;
            border: none;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Consistent background color */
            color: #333; /* Consistent text color */
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .navbar.sticky {
            background-color: white !important; /* Solid background when sticky */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #000 !important;
        }
        .navbar-nav .nav-link:hover {
            color: #00d1b2 !important; /* Consistent hover color */
        }
        .container {
            padding-top: 100px; /* Ensure space below navbar */
        }
        .table {
            background-color: #fff; /* Table background color */
            color: #333; /* Table text color */
        }
        .btn-view {
            background-color: #000000; /* Consistent button color */
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-view:hover {
            background-color: #009a94; /* Darker shade on hover */
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa; /* Match footer background */
            color: #333; /* Footer text color */
            margin-top: 20px;
        }
        #salesChart {
            max-width: 800px; /* Maximum width for the chart */
            margin: 0 auto; /* Center the chart */
        }
        .total-revenue {
            font-size: rem; /* Larger font for revenue */
            color: black; /* Bootstrap primary color */
            margin-bottom: 20px; /* Spacing below the total revenue */
        }
        body, p, ul, address, a {
    margin: 0;
    padding: 0;
    text-decoration: none;
  }
  
  footer {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    background-color: white;
    padding: 50px 0;
    color: #000;
  }
  
  .footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .footer-left, .footer-right {
    flex: 1;
    max-width: 45%;
  }
  
  .footer-left {
    padding-right: 20px;
  }
  
  .footer-right {
    padding-left: 20px;
  }
  
  address p {
    font-size: 1em;
    line-height: 1.6;
  }
  
  .social-links {
    list-style: none;
    margin: 20px 0;
  }
  
  .social-links li {
    margin-bottom: 8px;
  }
  
  .social-links a {
    color: #000;
    font-size: 1em;
    transition: color 0.3s ease;
  }
  
  .social-links a:hover {
    color: #555;
  }
  
  .contact-info p {
    font-size: 1em;
    line-height: 1.6;
  }
  
  .contact-info a {
    color: #000;
    font-weight: bold;
  }
  
  .newsletter-form {
    width: 100%;
  }
  
  .newsletter-form label {
    font-size: 1.4em;
    margin-bottom: 15px;
    display: block;
  }
  
  .newsletter-input {
    display: flex;
    width: 100%;
    border-radius: 50px;
    overflow: hidden;
  }
  
  .newsletter-input input {
    flex: 1;
    padding: 15px 20px;
    border: 1px solid #eaeaea;
    background-color: #f8f8f8;
    font-size: 1em;
  }
  
  .newsletter-input input:focus {
    background-color: #fff;
    outline: none;
  }
  
  .newsletter-input button {
    padding: 0 20px;
    border: none;
    background-color: #000;
    color: #fff;
    font-size: 1.2em;
    cursor: pointer;
  }
  
  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    font-size: 0.9em;
    max-width: 1200px;
    margin: 40px auto 0 auto;
  }
  
  .footer-bottom p, .footer-bottom a {
    color: #555;
  }
  
  .footer-bottom a {
    color: #000;
    text-decoration: underline;
  }
  
  .footer-bottom span {
    color: red;
  }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <img src="images/jp.png" alt="Fuel Order Logo" id="navbar-logo" data-scrolled-src="images/jp.png">
    </a>
    <h2><strong>Dashboard</strong></h2>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
</ul>
        </ul>
    </div>
</nav>

<div class="container">
    <?php
    include 'connect.php';

    // Fetch total revenue of the company
    $revenue_sql = "SELECT SUM(Amount) as totalRevenue FROM orders";
    $revenue_result = $conn->query($revenue_sql);
    $totalRevenue = 0;

    if ($revenue_result && $row = $revenue_result->fetch_assoc()) {
        $totalRevenue = (float)$row['totalRevenue']; // Ensure totalRevenue is treated as a float
    }
    ?>
     <!-- Total Revenue Display -->
     <div class="total-revenue"><h2><strong>Total Revenue: ₹<?php echo number_format($totalRevenue, 2); ?></strong></h2></div>

    <!-- Sales Chart -->
    <h2>Sales</h2>
    <div style="position: relative; height: 40vh; width: 100%;">
        <canvas id="salesChart"></canvas>
    </div>
    <div class="search-container">
    <div class="input-group">
        <input type="text" id="search-input" class="form-control" placeholder="Search Orders..." aria-label="Search Orders...">
    </div>
</div>
    <h2>Orders</h2>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Customer Phone</th>
            <th>Fuel Type</th>
            <th>Order Date</th>
            <th>Order Time</th>
            <th>ETA</th>
            <th>Delivery Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="orders-table-body">
            <!-- PHP code to fetch and display orders -->
            <?php
            // Fetch total sales grouped by order date for the current month
            $sales_sql = "SELECT orderDate, SUM(Amount) as totalSales FROM orders WHERE MONTH(orderDate) = MONTH(CURRENT_DATE()) AND YEAR(orderDate) = YEAR(CURRENT_DATE()) GROUP BY orderDate ORDER BY orderDate";
            $sales_result = $conn->query($sales_sql);

            if (!$sales_result) {
                // Output SQL error if the query failed
                echo "Error: " . mysqli_error($conn);
            } else {
                $dates = [];
                $sales = [];
                if ($sales_result->num_rows > 0) {
                    while ($row = $sales_result->fetch_assoc()) {
                        $dates[] = $row['orderDate'];
                        $sales[] = (float)$row['totalSales']; // Ensure totalSales is treated as a float
                    }
                }
            }

            $sql = "SELECT * FROM orders"; // Fetch all columns from the 'orders' table
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
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
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<footer id="ft">
  <div class="footer-container">
    <div class="footer-left">
      <address>
        <p>1600</p>
        <p>Amphitheatre Parkway</p>
        <p>Palo Alto</p>
        <p>CA 94303</p>
      </address>
      <ul class="social-links">
        <li><a href="#">Twitter / X</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">LinkedIn</a></li>
      </ul>
      <div class="contact-info">
        <p>General enquiries: <a href="mailto:220701082@rajalakshmi.edu.in">220701082@rajalakshmi.edu.in</a></p>
        <p>New business: <a href="mailto:hariharaviswanathan@gmail.com">hariharaviswanathan@gmail.com</a></p>
      </div>
    </div>

    <div class="footer-right">
      <form action="#" method="post" class="newsletter-form">
        <label for="email">Subscribe to our newsletter</label>
        <div class="newsletter-input">
          <input type="email" id="email" name="email" placeholder="Your email" required>
          <button type="submit">&#8594;</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy;2024 JUICE UP</p>
    <p>R&D: <a href="https://ju.co">j.u.co</a></p>
    <p>Built by h-h-v <span>&#128293;</span></p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
<script>
      // Function to fetch search results via AJAX
      function fetchOrders(searchTerm = '') {
        $.ajax({
            url: 'search_orders.php', // PHP file to handle search
            type: 'POST',
            data: { search: searchTerm },
            success: function(response) {
                $('#orders-table-body').html(response); // Update the table body with search results
            }
        });
    }

    $(document).ready(function() {
        // Fetch all orders on page load
        fetchOrders(); // Load all orders initially

        // Handle input event for real-time search
        $('#search-input').on('input', function() {
            var searchTerm = $(this).val(); // Get current input value
            fetchOrders(searchTerm); // Fetch and display the results
        });
    });

    // ... (res
    // Scroll event to trigger navbar changes
    window.addEventListener('scroll', function () {
        var navbar = document.querySelector('.navbar');
        var logo = document.getElementById('navbar-logo');
        var originalSrc = 'images/jp.png'; // Original logo source
        var scrolledSrc = logo.getAttribute('data-scrolled-src'); // New logo source

        if (window.scrollY > 100) {
            navbar.classList.add('sticky');
            logo.src = scrolledSrc; // Change to the new logo
        } else {
            navbar.classList.remove('sticky');
            logo.src = originalSrc; // Change back to the original logo
        }
    });

    // Chart.js code to render sales chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line', // Line chart for current month
        data: {
            labels: <?php echo json_encode($dates); ?>, // Dates from PHP
            datasets: [{
                label: 'Total Sales',
                data: <?php echo json_encode($sales); ?>, // Sales data from PHP
                borderColor: 'rgba(55, 175, 225, 1)',
                backgroundColor: 'rgba(55, 175, 225, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Sales'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                }
            }
        }
    });
</script>
</body>
</html>