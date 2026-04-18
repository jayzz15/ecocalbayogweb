<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <i class="fas fa-sign-in-alt"></i>
        <h1>Welcome Back</h1>
        <p>Sign in to continue to your account</p>
    </div>

    <div class="login-body">
        <form id="loginForm" action="database/login.php" method="POST" novalidate>
      
            <div class="input-group" id="email-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" id="email" name="email" placeholder="hello@gmail.com" autocomplete="email">
                <div class="error-msg" id="email-error"></div>
            </div>

        
            <div class="input-group" id="password-group">
                <label><i class="fas fa-lock"></i> Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <button type="button" class="toggle-password" id="togglePasswordBtn" aria-label="Show password">
                        <i class="far fa-eye-slash"></i>
                    </button>
                </div>
                <div class="error-msg" id="password-error"></div>
            </div>

            <!-- Remember Me & Forgot Password Row -->
            <div class="form-options">
                <label class="remember-checkbox">
                    <input type="checkbox" id="rememberMe"> <span>Remember me</span>
                </label>
                <a href="forgotpass.php" id="forgotPasswordLink" class="forgot-link">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn"><i class="fas fa-arrow-right-to-bracket"></i> Sign In</button>

       
            <div id="form-message" class="form-message"></div>

            <hr>
            <div class="register-prompt">
                Don't have an account? <a href="registerForm.php">Create Account</a><br>
                <a href="index.php">Back to Home</a>
            </div>
        </form>
    </div>
</div>

<!-- External JavaScript -->
<script src="js/login.js"></script>
</body>
</html>