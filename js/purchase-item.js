document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const priceDisplay = document.getElementById('price');
    const paymentOptions = document.querySelectorAll('input[name="payment-method"]');
    const cardDetails = document.getElementById('card-details');
    const submitButton = document.getElementById('submit-btn');

    // Base price per unit
    basePrice = 25;

    // Update price based on quantity
    quantityInput.addEventListener('input', () => {
        const quantity = parseInt(quantityInput.value) || 1;
        priceDisplay.textContent = (basePrice * quantity).toFixed(2);
    });

    // Toggle card details visibility
    paymentOptions.forEach(option => {
        option.addEventListener('change', () => {
            if (option.value === 'card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        });
    });

    // Animate submit button
    submitButton.addEventListener('click', () => {
        submitButton.classList.add('animate');

        // Simulate submission
        setTimeout(() => {
            alert('Item purchased successfully!');
            submitButton.classList.remove('animate');
        }, 1500);
    });
});