(function () {
    const donationTypeBtns = document.querySelectorAll('.type-btn');
    const donationTypeHidden = document.getElementById('donationType');
    const submitBtn = document.getElementById('submitBtn');
    const toast = document.getElementById('toastNotification');
    const toastMsg = document.getElementById('toastMessage');

    const amountInput = document.getElementById('donationAmount');
    const refInput = document.getElementById('paymentReference');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const messageTextarea = document.getElementById('donationMessage');

    const amountError = document.getElementById('amountError');
    const refError = document.getElementById('refError');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');

    // Toggle donation type
    donationTypeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            donationTypeBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            donationTypeHidden.value = btn.getAttribute('data-type');
        });
    });

    function showToast(message, isError = false) {
        toastMsg.innerText = message;
        toast.classList.add('show');
        const icon = toast.querySelector('.fa-check-circle');
        if (isError) {
            toastMsg.style.color = '#ffc9c9';
            if (icon) icon.style.color = '#f87171';
        } else {
            toastMsg.style.color = 'white';
            if (icon) icon.style.color = '#4ade80';
        }
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    function clearErrors() {
        if (amountError) amountError.innerText = '';
        if (refError) refError.innerText = '';
        if (nameError) nameError.innerText = '';
        if (emailError) emailError.innerText = '';
        [amountInput, refInput, fullNameInput, emailInput].forEach(field => {
            if (field) field.style.borderColor = '';
        });
    }

    function validateForm() {
        let isValid = true;
        clearErrors();

        const amount = amountInput.value.trim();
        if (!amount) {
            amountError.innerText = 'Please enter donation amount.';
            amountInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else if (isNaN(amount) || parseFloat(amount) < 10) {
            amountError.innerText = 'Amount must be at least ₱10.';
            amountInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else {
            amountInput.style.borderColor = '';
        }

        const reference = refInput.value.trim();
        if (!reference) {
            refError.innerText = 'Transaction reference / GCash number is required.';
            refInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else if (reference.length < 4) {
            refError.innerText = 'Please provide a valid reference ID (at least 4 characters).';
            refInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else {
            refInput.style.borderColor = '';
        }

        const fullName = fullNameInput.value.trim();
        if (!fullName) {
            nameError.innerText = 'Full name is required.';
            fullNameInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else if (fullName.length < 2) {
            nameError.innerText = 'Enter a valid name.';
            fullNameInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else {
            fullNameInput.style.borderColor = '';
        }

        const email = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
        if (!email) {
            emailError.innerText = 'Email address is required.';
            emailInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else if (!emailPattern.test(email)) {
            emailError.innerText = 'Please enter a valid email (e.g., name@domain.com).';
            emailInput.style.borderColor = '#e53e3e';
            isValid = false;
        } else {
            emailInput.style.borderColor = '';
        }

        return isValid;
    }

    function handleSubmit(event) {
        event.preventDefault();

        if (!validateForm()) {
            showToast('Please fix the errors in the form.', true);
            return;
        }

        const donationData = {
            donationType: donationTypeHidden.value,
            amount: parseFloat(amountInput.value),
            paymentReference: refInput.value.trim(),
            fullName: fullNameInput.value.trim(),
            email: emailInput.value.trim(),
            phone: phoneInput.value.trim() || 'Not provided',
            message: messageTextarea.value.trim() || 'No message',
            timestamp: new Date().toISOString()
        };

        console.log('✅ Donation submitted (digital payment reference):', donationData);
        showToast(`Thank you ${donationData.fullName.split(' ')[0]}! Donation of ₱${donationData.amount} recorded. Ref: ${donationData.paymentReference.substring(0, 12)}...`, false);

        // Reset amount and reference fields
        amountInput.value = '';
        refInput.value = '';
        clearErrors();
        amountInput.focus();
    }

    const form = document.getElementById('donationForm');
    if (form) form.addEventListener('submit', handleSubmit);

    // Live validation feedback
    if (refInput) {
        refInput.addEventListener('input', function () {
            if (refError && refError.innerText && this.value.trim().length >= 4) {
                refError.innerText = '';
                this.style.borderColor = '';
            }
        });
    }
    if (amountInput) {
        amountInput.addEventListener('input', function () {
            if (amountError && amountError.innerText && this.value.trim() && parseFloat(this.value) >= 10) {
                amountError.innerText = '';
                this.style.borderColor = '';
            }
        });
    }
    if (emailInput) {
        emailInput.addEventListener('input', function () {
            if (emailError && emailError.innerText && this.value.trim() && /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(this.value)) {
                emailError.innerText = '';
                this.style.borderColor = '';
            }
        });
    }
    if (fullNameInput) {
        fullNameInput.addEventListener('input', function () {
            if (nameError && nameError.innerText && this.value.trim().length >= 2) {
                nameError.innerText = '';
                this.style.borderColor = '';
            }
        });
    }
})();