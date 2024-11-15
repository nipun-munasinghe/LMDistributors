// Theme Toggle - Dark Mode / Light Mode
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';

    document.body.classList.add(`${currentTheme}-mode`);

    themeToggle.addEventListener('change', () => {
        const theme = document.body.classList.contains('light-mode') ? 'dark' : 'light';
        document.body.classList.toggle('light-mode');
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('theme', theme);
    });
});