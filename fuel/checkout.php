<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .navbar.sticky {
            background-color: white !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .container {
            padding-top: 50px;
        }
        .checkout-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-weight: 700;
            color: #000;
            margin-bottom: 20px;
        }
        .order-summary h3 {
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #000;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1.25rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #009a94;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
            color: #333;
            margin-top: 20px;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #009a94;
            box-shadow: none;
        }
        .payment-option {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <img src="images/jp.png" alt="Fuel Order Logo" id="navbar-logo" data-scrolled-src="images/jp.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Service 1</a>
                    <a class="dropdown-item" href="#">Service 2</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">More Services</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="checkout-card">
        <h2>Checkout</h2>
        <div class="order-summary">
            <h3>Order Summary</h3>
            <p><strong>Fuel Type:</strong> <?php echo htmlspecialchars($_POST['fuelType']); ?></p>
            <p><strong>Delivery Date:</strong> <?php echo htmlspecialchars($_POST['date']); ?></p>
            <p><strong>Delivery Time:</strong> <?php echo htmlspecialchars($_POST['time']); ?></p>
        </div>

        <!-- New form section for customer details -->
        <form method="POST" action="payment.php">
            <input type="hidden" name="fuelType" value="<?php echo htmlspecialchars($_POST['fuelType']); ?>">
            <input type="hidden" name="date" value="<?php echo htmlspecialchars($_POST['date']); ?>">
            <input type="hidden" name="time" value="<?php echo htmlspecialchars($_POST['time']); ?>">

            <!-- Name input -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Phone number input -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <!-- Delivery address input -->
            <div class="form-group">
                <label for="address">Delivery Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your delivery address" required></textarea>
            </div>

            <!-- Payment options -->
            <div class="form-group">
                <label>Payment Method</label>
                <div class="payment-option">
                    <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" required>
                    <label for="creditCard">Credit/Debit Card</label>
                </div>
                <div class="payment-option">
                    <input type="radio" id="gpay" name="paymentMethod" value="gpay" required>
                    <label for="gpay">Google Pay</label>
                </div>
                <div class="payment-option">
                    <input type="radio" id="paypal" name="paymentMethod" value="paypal" required>
                    <label for="paypal">PayPal</label>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn-submit">Proceed to Payment</button>
        </form>
    </div>
</div>
<footer class="footer">
    <p class="mb-0">Juice Up &copy; 2024. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Scroll event to trigger navbar changes
    window.addEventListener('scroll', function () {
        var navbar = document.querySelector('.navbar');
        var logo = document.getElementById('navbar-logo');
        var originalSrc = 'images/jp.png';
        var scrolledSrc = logo.getAttribute('data-scrolled-src');

        if (window.scrollY > 100) {
            navbar.classList.add('sticky');
            logo.src = scrolledSrc;
        } else {
            navbar.classList.remove('sticky');
            logo.src = originalSrc;
        }
    });
</script>
</body>
</html>