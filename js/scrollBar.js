const content = document.getElementById('scrollable-content');
const scrollbar = document.getElementById('scrollbar-thumb');

let isDragging = false;
let startY;
let startScrollTop;

// Event listener for starting the drag
scrollbar.addEventListener('mousedown', function (e) {
    isDragging = true;
    startY = e.clientY;
    startScrollTop = content.scrollTop;
    document.body.style.userSelect = 'none'; 
});

// Event listener for dragging
document.addEventListener('mousemove', function (e) {
    if (isDragging) {
        const deltaY = e.clientY - startY;
        const contentScrollHeight = content.scrollHeight - content.clientHeight;
        const thumbScrollHeight = scrollbar.parentElement.clientHeight - scrollbar.clientHeight;

        // Calculate how much to scroll based on thumb movement
        const scrollAmount = (deltaY / thumbScrollHeight) * contentScrollHeight;
        content.scrollTop = startScrollTop + scrollAmount;

        // Move the scrollbar thumb accordingly
        const thumbTop = (content.scrollTop / contentScrollHeight) * thumbScrollHeight;
        scrollbar.style.top = `${thumbTop}px`;
    }
});

// Event listener to stop the drag
document.addEventListener('mouseup', function () {
    isDragging = false;
    document.body.style.userSelect = 'auto';
});

// Sync thumb position with content scrolling
content.addEventListener('scroll', function () {
    const contentScrollHeight = content.scrollHeight - content.clientHeight;
    const thumbScrollHeight = scrollbar.parentElement.clientHeight - scrollbar.clientHeight;
    const thumbTop = (content.scrollTop / contentScrollHeight) * thumbScrollHeight;
    scrollbar.style.top = `${thumbTop}px`;
});