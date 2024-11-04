<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fuel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Match background color */
            color: #333; /* Adjust text color */
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background */
            position: absolute; /* Start in normal flow */
            width: 100%;
            z-index: 10;
            transition: background-color 0.3s ease;
        }
        .navbar.sticky {
            background-color: white !important; /* Solid background when sticky */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            height: 20px;
        }
        .navbar-nav .nav-link {
            color: #000 !important; /* Dark text for nav links */
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #00d1b2 !important; /* Hover color */
        }
        .container {
            padding-top: 100px; /* Ensure space below navbar */
        }
        h2 {
            font-weight: 700; /* Bold header */
            color: #000000; /* Consistent theme color */
        }
        .btn-submit {
            background-color: #000000; /* Consistent theme color */
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
            background-color: #009a94; /* Darker shade on hover */
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa; /* Match with the body background */
            color: #333;
            margin-top: 20px;
        }
        .fuel-option {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .fuel-option img {
            width: 50px;
            margin-right: 15px;
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
    <h2 class="text-center mb-4">Select Fuel</h2>
    <form method="POST" action="delivery.php">
        <div class="form-group fuel-option">
            <input type="radio" id="super98" name="fuelType" value="Super 98" required>
            <label for="super98">
                <img src="images/super98.png" alt="Super 98"> Super 98 - ₹ 100.98/L
            </label>
        </div>
        <div class="form-group fuel-option">
            <input type="radio" id="special95" name="fuelType" value="Special 95" required>
            <label for="special95">
                <img src="images/special95.png" alt="Special 95"> Special 95 - ₹ 125.98/L
            </label>
        </div>
        <div class="form-group fuel-option">
            <input type="radio" id="diesel" name="fuelType" value="Diesel" required>
            <label for="diesel">
                <img src="images/diesel.png" alt="Diesel"> Diesel - ₹ 92.56/L
            </label>
        </div>
        <button type="submit" class="btn-submit">Continue</button>
    </form>
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
</script>
</body>
</html>