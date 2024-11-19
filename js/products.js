document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const productGrid = document.getElementById('productGrid');

    searchButton.addEventListener('click', () => {
        const query = searchInput.value.toLowerCase();
        const products = productGrid.querySelectorAll('.product-card');

        products.forEach(product => {
            const productName = product.querySelector('h3').textContent.toLowerCase();
            if (productName.includes(query)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
});