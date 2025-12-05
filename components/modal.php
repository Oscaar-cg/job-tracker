<!-- Popup login/register -->
<div id="authOverlay" class="overlay hidden">

    <div class="auth-modal glass">

        <span class="close-btn" onclick="closeAuthModal()">✖</span>

        <!-- Login form -->
        <div id="loginForm">
            <h2>Login</h2>
            <p id="login-error" style="color:red; text-align:center;"></p>

            <form method="POST" action="login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="auth-btn">Login</button>
            </form>

            <p class="switch-text">
                No account? <a href="#" onclick="switchToRegister()">Create one</a>
            </p>
        </div>

        <!-- Register form -->
        <div id="registerForm" class="hidden">
            <h2>Create account</h2>
            <p id="register-error" style="color:red; text-align:center;"></p>


            <form method="POST" action="register.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm password" required>

                <button type="submit" class="auth-btn">Register</button>
            </form>

            <p class="switch-text">
                Already have an account? <a href="#" onclick="switchToLogin()">Login</a>
            </p>
        </div>

    </div>
</div>
