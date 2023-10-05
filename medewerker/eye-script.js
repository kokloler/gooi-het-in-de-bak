// zichtbaar maken van wachtwoord
document.addEventListener("DOMContentLoaded", function() {
    var togglePassword = document.querySelector(".toggle-password");
    var passwordField = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        var type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
        this.classList.toggle("active");
    });
});