document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('quantity');
    const priceDisplay = document.getElementById('totalPriceDisplay');
    const paymentOptions = document.querySelectorAll('input[name="payment-method"]');
    const cardDetails = document.getElementById('card-details');
    const submitButton = document.getElementById('submit-btn');

    // Base price per unit
    const basePrice = parseFloat(document.getElementById('unitPrice').textContent);

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
            }
            else {
                cardDetails.style.display = 'none';
            }
        });
    });

    // Animate submit button
    submitButton.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent form submission immediately
        submitButton.classList.add('animate');

        setTimeout(() => {
            alert('Item purchased successfully!');

            //Redirect to products page after submitting
            // window.location.href = 'products.php';

            setTimeout(() => {
                document.getElementById('purchase-form').submit();
            }, 500);
        }, 1500);
    });
});