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

// hidden form for edit details
document.addEventListener("DOMContentLoaded", () => {
    // Get modal elements
    const modal = document.getElementById("editModal");
    const closeModalBtn = document.querySelector(".close-btn");

    // Attach event listener to edit icons
    document.querySelectorAll(".fa-edit").forEach(editBtn => {
        editBtn.addEventListener("click", (e) => {
            e.preventDefault();

            // Get the current row's data
            const row = e.target.closest("tr");
            const productID = row.querySelector(".productID").innerText;
            const productName = row.querySelector(".tName").innerText;
            const description = row.querySelector(".tDescription").innerText;
            const price = row.querySelector(".tPrice").innerText;
            const category = row.querySelector(".tCategory").innerText;
            const quantity = row.querySelector(".tQuantity").innerText;

            // Populate modal form fields
            document.getElementById("editProductID").value = productID;
            document.getElementById("editProductName").value = productName;
            document.getElementById("editDescription").value = description;
            document.getElementById("editPrice").value = price;
            document.getElementById("editCategory").value = category;
            document.getElementById("editQuantity").value = quantity;

            // Show the modal
            modal.style.display = "block";
        });
    });

    // Close the modal
    closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Close modal when clicking outside of it
    window.addEventListener("click", (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });
});