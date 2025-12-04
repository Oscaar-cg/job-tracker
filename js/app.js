function openAuthModal() {
    document.getElementById("authOverlay").classList.remove("hidden");
}

function closeAuthModal() {
    document.getElementById("authOverlay").classList.add("hidden");
}

function switchToRegister() {
    document.getElementById("authTitle").innerText = "Register";
    document.getElementById("authForm").action = "register_process.php";
}