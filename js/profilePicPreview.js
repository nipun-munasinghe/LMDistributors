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