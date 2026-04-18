(function() {
    const form = document.getElementById('registrationForm');
    const fullnameInput = document.getElementById('fullname');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirmPassword');
    const termsCheckbox = document.getElementById('terms');
    const messageDiv = document.getElementById('form-message');

    const fullnameError = document.getElementById('fullname-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const confirmError = document.getElementById('confirm-error');
    const termsError = document.getElementById('terms-error');

    function clearFieldErrors() {
        const groups = ['fullname-group', 'email-group', 'password-group', 'confirm-group'];
        groups.forEach(groupId => {
            const group = document.getElementById(groupId);
            if (group) group.classList.remove('error');
        });

        fullnameError.innerHTML = '';
        emailError.innerHTML = '';
        passwordError.innerHTML = '';
        confirmError.innerHTML = '';
        termsError.innerHTML = '';
    }

    function clearGlobalMessage() {
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

    function validateFullname(value) {
        const trimmed = value.trim();
        if (trimmed === '') return 'Full name is required.';
        if (trimmed.length < 2) return 'Name must be at least 2 characters.';
        if (!/^[a-zA-Z\u00C0-\u024F\u1E00-\u1EFF\s\-\'.]+$/.test(trimmed)) {
            return 'Name should contain only letters, spaces, hyphens or apostrophes.';
        }
        return '';
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
        const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/;
        if (!strongRegex.test(value)) {
            return 'Password must contain at least 1 uppercase, 1 lowercase and 1 number.';
        }
        return '';
    }

    function validateConfirm(password, confirm) {
        if (confirm === '') return 'Please confirm your password.';
        if (password !== confirm) return 'Passwords do not match.';
        return '';
    }

    function validateTerms(checked) {
        return checked ? '' : 'You must agree to the Terms of Service and Privacy Policy.';
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

    function validateFullForm() {
        let isValid = true;

        const nameErr = validateFullname(fullnameInput.value);
        setFieldError('fullname-group', fullnameError, nameErr);
        if (nameErr) isValid = false;

        const emailErr = validateEmail(emailInput.value);
        setFieldError('email-group', emailError, emailErr);
        if (emailErr) isValid = false;

        const passErr = validatePassword(passwordInput.value);
        setFieldError('password-group', passwordError, passErr);
        if (passErr) isValid = false;

        const confirmErr = validateConfirm(passwordInput.value, confirmInput.value);
        setFieldError('confirm-group', confirmError, confirmErr);
        if (confirmErr) isValid = false;

        const termsErr = validateTerms(termsCheckbox.checked);
        termsError.innerHTML = termsErr ? `<i class="fas fa-exclamation-circle"></i> ${termsErr}` : '';
        if (termsErr) isValid = false;

        return isValid;
    }

   async function handleSubmit(e) {
    e.preventDefault();

    clearGlobalMessage();

    const isValid = validateFullForm();
    if (!isValid) {
        showGlobalMessage('Please fix the errors above before continuing.', true);
        return;
    }

    const submitBtn = document.querySelector('.register-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Creating...';
    submitBtn.disabled = true;

    try {
    const formData = new FormData();
    formData.append('fullname', fullnameInput.value.trim());
    formData.append('email', emailInput.value.trim());
    formData.append('password', passwordInput.value);
    formData.append('confirmPassword', confirmInput.value);
    formData.append('terms', termsCheckbox.checked ? '1' : '');

    const response = await fetch('database/register.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        clearFieldErrors();
        showGlobalMessage(result.message, false);
        form.reset();
    } else {
        showGlobalMessage(result.message, true);
    }
} catch (error) {
    console.error('Registration error:', error);
    showGlobalMessage('An unexpected error occurred. Please try again later.', true);
} finally {
    submitBtn.innerHTML = originalText;
    submitBtn.disabled = false;
}
}

    function setupPasswordToggle(toggleBtnId, targetInputId) {
        const toggleBtn = document.getElementById(toggleBtnId);
        const targetInput = document.getElementById(targetInputId);

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

    function attachRealtimeListeners() {
        fullnameInput.addEventListener('input', () => {
            setFieldError('fullname-group', fullnameError, validateFullname(fullnameInput.value));
        });

        emailInput.addEventListener('input', () => {
            setFieldError('email-group', emailError, validateEmail(emailInput.value));
        });

        passwordInput.addEventListener('input', () => {
            setFieldError('password-group', passwordError, validatePassword(passwordInput.value));

            if (confirmInput.value.trim() !== '') {
                setFieldError('confirm-group', confirmError, validateConfirm(passwordInput.value, confirmInput.value));
            } else {
                setFieldError('confirm-group', confirmError, '');
            }
        });

        confirmInput.addEventListener('input', () => {
            setFieldError('confirm-group', confirmError, validateConfirm(passwordInput.value, confirmInput.value));
        });

        termsCheckbox.addEventListener('change', () => {
            const termsErr = validateTerms(termsCheckbox.checked);
            termsError.innerHTML = termsErr ? `<i class="fas fa-exclamation-circle"></i> ${termsErr}` : '';
        });
    }

    function init() {
        if (form) form.addEventListener('submit', handleSubmit);
        attachRealtimeListeners();
        setupPasswordToggle('togglePasswordBtn', 'password');
        setupPasswordToggle('toggleConfirmBtn', 'confirmPassword');
        clearFieldErrors();
        clearGlobalMessage();
    }

    init();
})();