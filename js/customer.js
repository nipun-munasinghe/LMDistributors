// Sidebar Toggle
const sidebar = document.getElementById('sidebar');
const openSidebar = document.getElementById('open-sidebar');
const closeSidebar = document.getElementById('close-sidebar');

openSidebar.addEventListener('click', () => {
    sidebar.style.left = '0';
    document.querySelector('.main-content').style.marginLeft = '250px';
});

closeSidebar.addEventListener('click', () => {
    sidebar.style.left = '-250px';
    document.querySelector('.main-content').style.marginLeft = '0';
});

// Profile Picture Preview
const profilePicInput = document.getElementById('profile-pic');
const profilePicPreview = document.getElementById('profile-pic-preview');

profilePicInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profilePicPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});