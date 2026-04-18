(function() {
    // DOM elements
    const requestForm = document.getElementById('requestResetForm');
    const resetForm = document.getElementById('resetPasswordForm');
    const resetEmailInput = document.getElementById('resetEmail');
    const newPasswordInput = document.getElementById('newPassword');
    const confirmPasswordInput = document.getElementById('confirmNewPassword');
    const resetEmailDisplay = document.getElementById('resetEmailDisplay');
    const requestMessageDiv = document.getElementById('request-message');
    const resetMessageDiv = document.getElementById('reset-message');
    
    // Error spans
    const emailError = document.getElementById('email-error');
    const newPasswordError = document.getElementById('new-password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');
    
    // Store email for reset process
    let currentResetEmail = '';
    
    // Helper: show message in specific message div
    function showMessage(messageDiv, text, type = 'error') {
        if(!messageDiv) return;
        messageDiv.innerHTML = text;
        if(type === 'error') {
            messageDiv.className = 'form-message error-message-global';
        } else if(type === 'success') {
            messageDiv.className = 'form-message success-message';
        } else {
            messageDiv.className = 'form-message info-message';
        }
    }
    
    function clearMessage(messageDiv) {
        if(messageDiv) {
            messageDiv.innerHTML = '';
            messageDiv.className = 'form-message';
        }
    }
    
    // Helper: set field error
    function setFieldError(groupId, errorSpan, errorMessage) {
        const group = document.getElementById(groupId);
        if(group) {
            if(errorMessage) {
                group.classList.add('error');
                errorSpan.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${errorMessage}`;
            } else {
                group.classList.remove('error');
                errorSpan.innerHTML = '';
            }
        }
    }
    
    // Validation functions
    function validateEmail(value) {
        const email = value.trim();
        if(email === '') return 'Email address is required.';
        const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
        if(!emailRegex.test(email)) return 'Please enter a valid email address.';
        return '';
    }
    
    function validateNewPassword(value) {
        if(value === '') return 'New password is required.';
        if(value.length < 8) return 'Password must be at least 8 characters.';
        const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/;
        if(!strongRegex.test(value)) {
            return 'Password must contain at least 1 uppercase, 1 lowercase, and 1 number.';
        }
        return '';
    }
    
    function validateConfirmPassword(password, confirm) {
        if(confirm === '') return 'Please confirm your password.';
        if(password !== confirm) return 'Passwords do not match.';
        return '';
    }
    
    // Mock API: Send reset link
    async function sendResetLink(email) {
        console.log('Sending reset link to:', email);
        
        return new Promise((resolve) => {
            setTimeout(() => {
                // Demo: Accept any valid email format
                // In real app, check if email exists in database
                const demoEmails = ['demo@example.com', 'user@test.com', 'admin@example.com'];
                
                if (email === 'demo@example.com' || email === 'user@test.com' || email === 'admin@example.com') {
                    resolve({ 
                        success: true, 
                        message: `Reset link sent to ${email}. Check your inbox! (Demo: Use any valid email format)` 
                    });
                } else {
                    // For demo, we still accept but show warning (better UX)
                    resolve({ 
                        success: true, 
                        message: `If an account exists with ${email}, you will receive a reset link. (Demo mode - proceeding anyway)` 
                    });
                }
            }, 1000);
        });
    }
    
    // Mock API: Update password
    async function updatePassword(email, newPassword) {
        console.log('Updating password for:', email);
        
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ 
                    success: true, 
                    message: 'Password has been reset successfully! You can now login with your new password.' 
                });
            }, 1000);
        });
    }
    
    // Handle send reset link
    async function handleSendResetLink(e) {
        e.preventDefault();
        
        clearMessage(requestMessageDiv);
        
        const email = resetEmailInput.value.trim();
        const emailErr = validateEmail(email);
        setFieldError('email-group', emailError, emailErr);
        
        if(emailErr) {
            showMessage(requestMessageDiv, 'Please fix the error above.', 'error');
            return;
        }
        
        // Disable button
        const submitBtn = document.getElementById('sendResetBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Sending...';
        submitBtn.disabled = true;
        
        try {
            const result = await sendResetLink(email);
            
            if(result.success) {
                // Store email for reset step
                currentResetEmail = email;
                resetEmailDisplay.textContent = email;
                
                // Show success message
                showMessage(requestMessageDiv, result.message, 'success');
                
                // Switch to reset password form after short delay
                setTimeout(() => {
                    requestForm.style.display = 'none';
                    resetForm.style.display = 'block';
                    clearMessage(requestMessageDiv);
                    // Clear any previous reset form errors
                    clearResetFormErrors();
                }, 2000);
            } else {
                showMessage(requestMessageDiv, result.message, 'error');
            }
        } catch (error) {
            showMessage(requestMessageDiv, 'Network error. Please try again.', 'error');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    }
    
    // Clear reset form errors
    function clearResetFormErrors() {
        setFieldError('new-password-group', newPasswordError, '');
        setFieldError('confirm-password-group', confirmPasswordError, '');
        if(newPasswordInput) newPasswordInput.value = '';
        if(confirmPasswordInput) confirmPasswordInput.value = '';
        clearMessage(resetMessageDiv);
    }
    
    // Handle password reset submission
    async function handleResetPassword(e) {
        e.preventDefault();
        
        clearMessage(resetMessageDiv);
        
        const newPassword = newPasswordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        const passwordErr = validateNewPassword(newPassword);
        setFieldError('new-password-group', newPasswordError, passwordErr);
        
        let confirmErr = '';
        if(!passwordErr) {
            confirmErr = validateConfirmPassword(newPassword, confirmPassword);
            setFieldError('confirm-password-group', confirmPasswordError, confirmErr);
        } else {
            setFieldError('confirm-password-group', confirmPasswordError, '');
        }
        
        if(passwordErr || confirmErr) {
            showMessage(resetMessageDiv, 'Please fix the errors above.', 'error');
            return;
        }
        
        // Disable button
        const submitBtn = document.getElementById('updatePasswordBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Updating...';
        submitBtn.disabled = true;
        
        try {
            const result = await updatePassword(currentResetEmail, newPassword);
            
            if(result.success) {
                showMessage(resetMessageDiv, result.message, 'success');
                
                // Redirect to login after 2 seconds
                setTimeout(() => {
                    window.location.href = 'login.php';
                }, 2000);
            } else {
                showMessage(resetMessageDiv, result.message, 'error');
            }
        } catch (error) {
            showMessage(resetMessageDiv, 'Network error. Please try again.', 'error');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    }
    
    // Real-time validation for request form
    function attachRealtimeValidation() {
        if(resetEmailInput) {
            resetEmailInput.addEventListener('input', () => {
                const err = validateEmail(resetEmailInput.value);
                setFieldError('email-group', emailError, err);
                clearMessage(requestMessageDiv);
            });
        }
        
        if(newPasswordInput) {
            newPasswordInput.addEventListener('input', () => {
                const err = validateNewPassword(newPasswordInput.value);
                setFieldError('new-password-group', newPasswordError, err);
                // Also revalidate confirm if not empty
                if(confirmPasswordInput.value.trim() !== '') {
                    const confirmErr = validateConfirmPassword(newPasswordInput.value, confirmPasswordInput.value);
                    setFieldError('confirm-password-group', confirmPasswordError, confirmErr);
                }
                clearMessage(resetMessageDiv);
            });
        }
        
        if(confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', () => {
                const err = validateConfirmPassword(newPasswordInput.value, confirmPasswordInput.value);
                setFieldError('confirm-password-group', confirmPasswordError, err);
                clearMessage(resetMessageDiv);
            });
        }
    }
    
    // Toggle password visibility for all password fields
    function setupPasswordToggles() {
        // Toggle for new password
        const toggleNewBtn = document.getElementById('toggleNewPasswordBtn');
        const newPasswordField = document.getElementById('newPassword');
        if(toggleNewBtn && newPasswordField) {
            toggleNewBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const type = newPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                newPasswordField.setAttribute('type', type);
                const icon = toggleNewBtn.querySelector('i');
                if(icon) {
                    if(type === 'text') {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    } else {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                }
            });
        }
        
        // Toggle for confirm password
        const toggleConfirmBtn = document.getElementById('toggleConfirmPasswordBtn');
        const confirmPasswordField = document.getElementById('confirmNewPassword');
        if(toggleConfirmBtn && confirmPasswordField) {
            toggleConfirmBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordField.setAttribute('type', type);
                const icon = toggleConfirmBtn.querySelector('i');
                if(icon) {
                    if(type === 'text') {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    } else {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                }
            });
        }
    }
  
    
    // Initialize
    function init() {
        if(requestForm) requestForm.addEventListener('submit', handleSendResetLink);
        if(resetForm) resetForm.addEventListener('submit', handleResetPassword);
        
        attachRealtimeValidation();
        setupPasswordToggles();
        addDemoInfo();
        
        // Clear any initial errors
        setFieldError('email-group', emailError, '');
        setFieldError('new-password-group', newPasswordError, '');
        setFieldError('confirm-password-group', confirmPasswordError, '');
    }
    
    init();
})();