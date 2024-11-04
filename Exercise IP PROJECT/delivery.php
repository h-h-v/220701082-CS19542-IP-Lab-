<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Delivery Time</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Light background for consistency */
            color: #333; /* Dark text color */
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background */
        }
        .navbar-brand img {
            height: 20px;
        }
        .navbar-nav .nav-link {
            color: #000 !important; /* Dark text for nav links */
        }
        .container {
            padding-top: 50px;
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
        /* Responsive design */
        @media (min-width: 768px) {
            .only-mobile {
                display: none; /* Hide on larger screens */
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
        <img src="images/jp.png" alt="Fuel Order Logo">
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
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Select Delivery Time</h2>
    <form method="POST" action="checkout.php">
        <div class="form-group">
            <label for="date">Delivery Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Delivery Time</label>
            <select class="form-control" id="time" name="time" required>
                <option value="1pm-2pm">1 pm - 2 pm</option>
                <option value="2pm-3pm">2 pm - 3 pm</option>
                <option value="3pm-4pm">3 pm - 4 pm</option>
                <option value="4pm-5pm">4 pm - 5 pm</option>
                <option value="5pm-6pm">5 pm - 6 pm</option>
                <option value="6pm-7pm">6 pm - 7 pm</option>
                <option value="7pm-8pm">7 pm - 8 pm</option>
                <option value="8pm-9pm">8 pm - 9 pm</option>
                <option value="9pm-10pm">9 pm - 10 pm</option>
                <option value="10pm-11pm">10 pm - 11 pm</option>
            </select>
        </div>
        <input type="hidden" name="fuelType" value="<?php echo $_POST['fuelType']; ?>">
        <button type="submit" class="btn-submit">Next</button>
    </form>
</div>
<footer class="footer">
<p class="mb-0">Juice Up&copy; 2024. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Set today's date as the minimum date for the date input
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        const dd = String(today.getDate()).padStart(2, '0');
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        const yyyy = today.getFullYear();
        const minDate = `${yyyy}-${mm}-${dd}`;
        document.getElementById('date').setAttribute('min', minDate);
    });
</script>
</body>
</html>