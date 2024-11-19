document.addEventListener('DOMContentLoaded', () => {
    const purchaseButton = document.querySelector('.purchase-button');
    purchaseButton.addEventListener('click', () => {
        window.location.href = './purchase-item.php';
    });
});