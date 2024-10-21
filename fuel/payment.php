<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            padding-top: 100px;
        }
        h2 {
            font-weight: 700;
            color: #000;
        }
        .btn-submit {
            background-color: #000;
            color: white;
            padding: 15px 30px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #009a94;
        }
        .payment-option {
            display: none; /* Initially hide all payment option forms */
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Payment</h2>
    <form method="POST" action="order-handler.php">
        <input type="hidden" name="fuelType" value="<?php echo htmlspecialchars($_POST['fuelType']); ?>">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($_POST['date']); ?>">
        <input type="hidden" name="time" value="<?php echo htmlspecialchars($_POST['time']); ?>">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
        <input type="hidden" name="phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
        <input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']); ?>">
        <input type="hidden" name="paymentMethod" value="<?php echo htmlspecialchars($_POST['paymentMethod']); ?>">

        <div id="creditCard" class="payment-option">
            <h3>Credit/Debit Card Payment</h3>
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter your card number" required>
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter your CVV" required>
            </div>
        </div>

        <div id="gpay" class="payment-option">
            <h3>Google Pay Payment</h3>
            <p>Please complete the payment using Google Pay on your device.</p>
            <p>Follow the prompts in your Google Pay app.</p>
        </div>

        <div id="paypal" class="payment-option">
            <h3>PayPal Payment</h3>
            <p>Please complete the payment using PayPal.</p>
            <button type="button" class="btn btn-primary" onclick="window.open('https://www.paypal.com', '_blank')">Pay with PayPal</button>
        </div>

        <button type="submit" class="btn-submit">Pay Now</button>
    </form>
</div>

<script>
    // Get the payment method from the hidden input
    const paymentMethod = "<?php echo htmlspecialchars($_POST['paymentMethod']); ?>";

    // Display the appropriate payment option based on the selected method
    if (paymentMethod === 'creditCard') {
        document.getElementById('creditCard').style.display = 'block';
    } else if (paymentMethod === 'gpay') {
        document.getElementById('gpay').style.display = 'block';
    } else if (paymentMethod === 'paypal') {
        document.getElementById('paypal').style.display = 'block';
    }
</script>
</body>
</html>