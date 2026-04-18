<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title> Forgot Password</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/forgot.css">
</head>
<body>

<div class="forgot-container">
    <div class="forgot-header">
        <i class="fas fa-key"></i>
        <h1>Forgot Password?</h1>
        <p>Don't worry, we'll help you reset it</p>
    </div>

    <div class="forgot-body">
        <!-- Step 1: Request Reset Email Form -->
        <form id="requestResetForm" class="reset-step" novalidate>
            <div class="input-group" id="email-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" id="resetEmail" name="email" placeholder="Enter your registered email" autocomplete="email">
                <div class="error-msg" id="email-error"></div>
            </div>

            <button type="submit" class="reset-btn" id="sendResetBtn">
                <i class="fas fa-paper-plane"></i> Send Reset Link
            </button>

            <div id="request-message" class="form-message"></div>

            <hr>
            <div class="back-links">
                <a href="login.php"><i class="fas fa-arrow-left"></i> Back to Login</a>
                <a href="index.php">Create Account</a>
            </div>
        </form>

        <!-- Step 2: Reset Password Form (hidden initially) -->
        <form id="resetPasswordForm" class="reset-step" style="display: none;" novalidate>
            <div class="info-banner">
                <i class="fas fa-shield-alt"></i>
                <span>Reset password for: <strong id="resetEmailDisplay"></strong></span>
            </div>

            <div class="input-group" id="new-password-group">
                <label><i class="fas fa-lock"></i> New Password</label>
                <div class="password-wrapper">
                    <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
                    <button type="button" class="toggle-password" id="toggleNewPasswordBtn" aria-label="Show password">
                        <i class="far fa-eye-slash"></i>
                    </button>
                </div>
                <div class="error-msg" id="new-password-error"></div>
                <div class="password-hint">Must be at least 8 characters with 1 uppercase, 1 lowercase, and 1 number</div>
            </div>

            <div class="input-group" id="confirm-password-group">
                <label><i class="fas fa-check-circle"></i> Confirm New Password</label>
                <div class="password-wrapper">
                    <input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm your new password">
                    <button type="button" class="toggle-password" id="toggleConfirmPasswordBtn" aria-label="Show password">
                        <i class="far fa-eye-slash"></i>
                    </button>
                </div>
                <div class="error-msg" id="confirm-password-error"></div>
            </div>

            <button type="submit" class="reset-btn" id="updatePasswordBtn">
                <i class="fas fa-check-circle"></i> Reset Password
            </button>

            <div id="reset-message" class="form-message"></div>

            <hr>
            <div class="back-links">
                <a href="login.php"><i class="fas fa-arrow-left"></i> Back to Login</a>
            </div>
        </form>
    </div>
</div>

<!-- External JavaScript -->
<script src="js/forgot.js"></script>
</body>
</html>