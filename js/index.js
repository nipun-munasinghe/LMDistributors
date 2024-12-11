// index.js
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.animate__animated');
        
    const onScroll = () => {
        animatedElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                element.style.opacity = 1;
            }
        });
    };
        
    window.addEventListener('scroll', onScroll);
    onScroll();
});
        