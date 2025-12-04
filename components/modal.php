<!-- Popup login/register -->
<div id="authOverlay" class="overlay hidden">

    <div class="auth-modal glass">

        <!-- close popup -->
        <span class="close-btn" onclick="closeAuthModal()">✖</span>

        <!-- Login form -->
        <div id="loginForm">
            <h2>Login</h2>

            <!-- login form -->
            <form method="POST" action="login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="auth-btn">Login</button>
            </form>

            <!-- switch to register -->
            <p class="switch-text">
                No account? <a href="#" onclick="switchToRegister()">Create one</a>
            </p>
        </div>

        <!-- Register form -->
        <div id="registerForm" class="hidden">
            <h2>Create account</h2>

            <!-- register form -->
            <form method="POST" action="register.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm password" required>

                <button type="submit" class="auth-btn">Register</button>
            </form>

            <!-- switch back to login -->
            <p class="switch-text">
                Already have an account? <a href="#" onclick="switchToLogin()">Login</a>
            </p>
        </div>

    </div>
</div>
