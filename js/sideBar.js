// Toggle Sidebar
const toggleSidebar = document.getElementById('toggle-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const sidebar = document.getElementById('sidebar');

// Show Sidebar
toggleSidebar.addEventListener('click', () => {
    sidebar.classList.add('active');
});

// Hide Sidebar
closeSidebar.addEventListener('click', () => {
    sidebar.classList.remove('active');
});