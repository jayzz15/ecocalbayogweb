(function() {
    // DOM elements
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const rememberCheckbox = document.getElementById('rememberMe');
    const messageDiv = document.getElementById('form-message');

    // Error span elements
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    function clearFieldErrors() {
        const emailGroup = document.getElementById('email-group');
        const passwordGroup = document.getElementById('password-group');

        if (emailGroup) emailGroup.classList.remove('error');
        if (passwordGroup) passwordGroup.classList.remove('error');

        if (emailError) emailError.innerHTML = '';
        if (passwordError) passwordError.innerHTML = '';

        if (messageDiv) {
            messageDiv.innerHTML = '';
            messageDiv.className = 'form-message';
        }
    }

    function showGlobalMessage(text, isError = false) {
        if (!messageDiv) return;
        messageDiv.innerHTML = text;
        messageDiv.className = isError
            ? 'form-message error-message-global'
            : 'form-message success-message';
    }

    function validateEmail(value) {
        const email = value.trim();
        if (email === '') return 'Email address is required.';
        const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
        if (!emailRegex.test(email)) return 'Please enter a valid email address.';
        return '';
    }

    function validatePassword(value) {
        if (value === '') return 'Password is required.';
        if (value.length < 8) return 'Password must be at least 8 characters.';
        return '';
    }

    function setFieldError(groupId, errorSpan, errorMessage) {
        const group = document.getElementById(groupId);
        if (group) {
            if (errorMessage) {
                group.classList.add('error');
                errorSpan.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${errorMessage}`;
            } else {
                group.classList.remove('error');
                errorSpan.innerHTML = '';
            }
        }
    }

    function attachRealtimeValidation() {
        emailInput.addEventListener('input', () => {
            const err = validateEmail(emailInput.value);
            setFieldError('email-group', emailError, err);
        });

        passwordInput.addEventListener('input', () => {
            const err = validatePassword(passwordInput.value);
            setFieldError('password-group', passwordError, err);
        });
    }

    function validateFullForm() {
        let isValid = true;

        const emailErr = validateEmail(emailInput.value);
        setFieldError('email-group', emailError, emailErr);
        if (emailErr) isValid = false;

        const passErr = validatePassword(passwordInput.value);
        setFieldError('password-group', passwordError, passErr);
        if (passErr) isValid = false;

        return isValid;
    }

    function saveRememberMe(email, remember) {
        if (remember) {
            localStorage.setItem('rememberedEmail', email);
            localStorage.setItem('rememberMeChecked', 'true');
        } else {
            localStorage.removeItem('rememberedEmail');
            localStorage.removeItem('rememberMeChecked');
        }
    }

    function loadRememberedEmail() {
        const rememberedEmail = localStorage.getItem('rememberedEmail');
        const rememberChecked = localStorage.getItem('rememberMeChecked');

        if (rememberedEmail && rememberChecked === 'true') {
            emailInput.value = rememberedEmail;
            if (rememberCheckbox) rememberCheckbox.checked = true;
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();

        if (messageDiv) {
            messageDiv.innerHTML = '';
            messageDiv.className = 'form-message';
        }

        const isValid = validateFullForm();

        if (!isValid) {
            showGlobalMessage('Please fix the errors above before logging in.', true);
            return;
        }

        const submitBtn = document.querySelector('.login-btn');
        const originalText = submitBtn ? submitBtn.innerHTML : 'Login';

        if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Signing in...';
            submitBtn.disabled = true;
        }

        try {
            const formData = new FormData();
            formData.append('email', emailInput.value.trim());
            formData.append('password', passwordInput.value);
            formData.append('rememberMe', rememberCheckbox && rememberCheckbox.checked ? '1' : '0');

            const response = await fetch('database/login.php', {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            console.log('Login raw response:', text);

            let result;
            try {
                result = JSON.parse(text);
            } catch (jsonError) {
                throw new Error('Invalid JSON response from server: ' + text);
            }

            if (result.success) {
                saveRememberMe(emailInput.value.trim(), rememberCheckbox && rememberCheckbox.checked);
                showGlobalMessage(result.message, false);

                passwordInput.value = '';

                setTimeout(() => {
                    window.location.href = result.redirect || 'dashboard.php';
                }, 1000);
            } else {
                showGlobalMessage(result.message, true);
                passwordInput.value = '';
                setFieldError('password-group', passwordError, '');
            }
        } catch (error) {
            console.error('Login error:', error);
            showGlobalMessage('Server error. Please check login.php response.', true);
        } finally {
            if (submitBtn) {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        }
    }

    function setupPasswordToggle() {
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const targetInput = document.getElementById('password');

        if (toggleBtn && targetInput) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const type = targetInput.getAttribute('type') === 'password' ? 'text' : 'password';
                targetInput.setAttribute('type', type);

                const icon = toggleBtn.querySelector('i');
                if (icon) {
                    if (type === 'text') {
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

    function init() {
        if (form) form.addEventListener('submit', handleSubmit);
        attachRealtimeValidation();
        setupPasswordToggle();
        loadRememberedEmail();
        clearFieldErrors();
    }

    init();
})();