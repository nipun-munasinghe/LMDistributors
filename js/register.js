const registerButton = document.getElementById("register-button");

registerButton.addEventListener("click", (e) => {
    e.target.style.transform = "scale(1.1)";
    setTimeout(() => {
        e.target.style.transform = "scale(1)";
    }, 200);
});