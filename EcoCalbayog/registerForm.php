<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Registration Form</title>
 
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="register-container">
    <div class="form-header">
        <i class="fas fa-user-plus"></i>
        <h1>Create account</h1>
        <p>Join us and unlock exclusive features</p>
    </div>

    <div class="form-body">
        <form id="registrationForm" action="database/register.php" method="POST" novalidate>
          
            <div class="input-group" id="fullname-group">
                <label><i class="fas fa-user"></i> Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="fullname" autocomplete="name" required>
                <div class="error-msg" id="fullname-error"></div>
            </div>

           
            <div class="input-group" id="email-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" id="email" name="email" placeholder="hello@gmail.com" autocomplete="email" required>
                <div class="error-msg" id="email-error"></div>
            </div>

         
            <div class="input-group" id="password-group">
                <label><i class="fas fa-lock"></i> Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                    <button type="button" class="toggle-password" id="togglePasswordBtn" aria-label="Show password" >
                        <i class="far fa-eye-slash"></i>
                    </button>
                </div>
                <div class="error-msg" id="password-error"></div>
            </div>

      
            <div class="input-group" id="confirm-group">
                <label><i class="fas fa-check-circle"></i> Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                    <button type="button" class="toggle-password" id="toggleConfirmBtn" aria-label="Show password">
                        <i class="far fa-eye-slash"></i>
                    </button>
                </div>
                <div class="error-msg" id="confirm-error"></div>
            </div>

      
            <div class="input-group checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#" id="termsLink">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
            </div>
            <div class="error-msg" id="terms-error" style="margin-top: -10px; margin-bottom: 8px;"></div>

        
            <button type="submit" class="register-btn"><i class="fas fa-arrow-right-to-bracket"></i> Sign Up</button>

            <div id="form-message" class="form-message"></div>

            <hr>
            <div class="login-prompt">
                Already have an account? <a href="login.php">Log in</a>
            </div>
        </form>
    </div>
</div>


<script src="js/register.js"></script>
</body>
</html>