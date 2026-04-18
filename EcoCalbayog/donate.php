<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form | EcoCalbayog</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/donate.css">
</head>

<body>
    <div class="donation-page">
        <div class="donation-card">
            <div class="donation-header">
                <div class="donation-icon">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <h2>Make a Donation</h2>
                <p>Your generosity helps protect Calbayog's environment</p>
            </div>

            <form id="donationForm" class="donation-form">
                <!-- Donation Type -->
                <div class="form-group">
                    <label>Donation Type</label>
                    <div class="donation-type">
                        <button type="button" class="type-btn active" data-type="one-time">One-time</button>
                        <button type="button" class="type-btn" data-type="monthly">Monthly</button>
                    </div>
                    <input type="hidden" id="donationType" value="one-time">
                </div>

                <!-- Digital payment section (replaces old cash instructions) -->
                <div class="payment-hint">
                    <i class="fa-brands fa-gcash"></i>
                    <span><strong>Digital payment via GCash / Bank transfer</strong> — after donating, enter your
                        transaction reference below.</span>
                </div>

                <div class="form-group">
                    <label for="donationAmount">Donation Amount (₱) *</label>
                    <input type="number" id="donationAmount" placeholder="e.g., 500" step="1" min="10">
                    <div class="form-error" id="amountError"></div>
                </div>

                <div class="form-group">
                    <label for="paymentReference">Transaction Reference / GCash Reference No. *</label>
                    <input type="text" id="paymentReference"
                        placeholder="Enter GCash transaction ID, bank ref, or PayMaya number">
                    <div class="form-error" id="refError"></div>
                    <small style="color: #4b5563; display: block; margin-top: 0.3rem;">Example: GCash confirmation # or
                        reference code from your e-wallet</small>
                </div>

                <div class="form-group">
                    <label for="fullName">Full Name *</label>
                    <input type="text" id="fullName" placeholder="Enter your full name">
                    <div class="form-error" id="nameError"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" placeholder="your@email.com">
                    <div class="form-error" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" placeholder="Contact number">
                </div>

                <div class="form-group">
                    <label for="donationMessage">Message (Optional)</label>
                    <textarea id="donationMessage" rows="3" placeholder="Leave a message of support..."></textarea>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fa-solid fa-heart"></i> Complete Donation
                </button>
                <a class="donate" href="index.php">Back to Home</a>
            </form>
        </div>
    </div>

    <!-- Success Toast -->
    <div class="toast-notification" id="toastNotification">
        <div class="toast-content">
            <i class="fa-solid fa-check-circle"></i>
            <span id="toastMessage">Donation submitted successfully!</span>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="js/donate.js"></script>
</body>

</html>