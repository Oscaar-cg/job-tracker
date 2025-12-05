function openAuthModal() {
    document.getElementById("authOverlay").classList.remove("hidden");
    showLogin();
}

function closeAuthModal() {
    document.getElementById("authOverlay").classList.add("hidden");
}

function showLogin() {
    document.getElementById("loginForm").classList.remove("hidden");
    document.getElementById("registerForm").classList.add("hidden");
}

function showRegister() {
    document.getElementById("registerForm").classList.remove("hidden");
    document.getElementById("loginForm").classList.add("hidden");
}

function switchToRegister() {
    showRegister();
}

function switchToLogin() {
    showLogin();
}
