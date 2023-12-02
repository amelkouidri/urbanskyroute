const showPassButton = document.getElementById("show-pass");
const passwordInput = document.getElementById("pass");

showPassButton.addEventListener("click", () => {
    if (passwordInput.type === "password") {
        passwordInput.type = "text"; // Afficher le mot de passe
    } else {
        passwordInput.type = "password"; // Masquer le mot de passe
    }
});