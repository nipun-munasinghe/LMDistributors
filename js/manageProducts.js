// Get elements
const showFormBtn = document.getElementById('hiddenFormBtn');
const formContainer = document.getElementById('formContainer');
const cancelBtn = document.getElementById('cancelForm');

// Show form on button click
showFormBtn.addEventListener('click', () => {
    formContainer.classList.remove('hidden');
});

// Hide form on cancel button click
cancelBtn.addEventListener('click', () => {
    formContainer.classList.add('hidden');
});