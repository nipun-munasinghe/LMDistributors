document.getElementById('show-password').addEventListener('change', function () {
    const passwordInput = document.getElementById('password');

    if (this.checked) {
      passwordInput.type = 'text';
    } 
    else {
      passwordInput.type = 'password';
    }
});