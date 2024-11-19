document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', () => {
            const answer = item.querySelector('.faq-answer');
            const icon = question.querySelector('i');

            // Toggle the display of the answer
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';

            // Rotate the icon
            icon.classList.toggle('rotate');
        });
    });
});