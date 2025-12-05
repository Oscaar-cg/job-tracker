<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // check si user co
?>

<?php include "components/modal.php"; ?> <!-- popup login/register -->

<?php
// open popup auto si pas co
if (!$isLoggedIn) {
    echo "<script>window.onload = () => openAuthModal();</script>";
}

// error handling login/register, show popup + message
if (isset($_GET['error'])) {

    $error = $_GET['error'];

    if ($error === "wrong_password") {
        echo "<script>
            window.onload = () => {
                openAuthModal();
                showLogin();
                document.getElementById('login-error').innerText = 'Incorrect password.';
            };
        </script>";
    }

    if ($error === "user_not_found") {
        echo "<script>
            window.onload = () => {
                openAuthModal();
                showLogin();
                document.getElementById('login-error').innerText = 'No account found with this email.';
            };
        </script>";
    }

    if ($error === "email_exists") {
        echo "<script>
            window.onload = () => {
                openAuthModal();
                showRegister();
                document.getElementById('register-error').innerText = 'Email already exists.';
            };
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Tracker</title>
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Website favicon (SVG logo) -->
    <link rel="icon" type="image/svg+xml" href="images/logo1.svg">
</head>

<body>

<!--Menu-->
<nav>
    <ul class="navbar-left">
        <li><a href="index.php">Home</a></li>
        <li><a href="tracker.php">Job Tracker</a></li>
        <li><a href="analyzer.php">Resume Analyzer</a></li>
        <li><a href="technologies.php">Technologies</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>

    <ul class="navbar-right">
        <?php if ($isLoggedIn): ?>
            <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="#" onclick="openAuthModal()">Login</a></li>
            <li><a href="#" onclick="openAuthModal()">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>

<!-- message lock si pas co -->
<?php if (!$isLoggedIn): ?>
    <div class="lock-message">
        <p>You need to login or create an account to use this feature.</p>
    </div>
<?php endif; ?>

<!-- page content (blur si pas co) -->
<div class="page-content <?php if (!$isLoggedIn) echo 'locked'; ?>">

<header>
    <h1>Job Tracker</h1>
    <p class="home-intro-text">Keep track of all your job applications in one place!</p>
</header>

<section id="add-job">
    <h2>Add a Job</h2>

    <form id="jobForm">
        <label for="job-title">Job Title:</label>
        <input type="text" id="job-title" name="job-title" required>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" required>

        <label for="status">Application Status:</label>
        <select id="status" name="status">
            <option value="Applied">Applied</option>
            <option value="Interview">Interview</option>
            <option value="Offer">Offer</option>
            <option value="Rejected">Rejected</option>
        </select>

        <button type="submit">Add Job</button>
    </form>
</section>

<section id="job-list">
    <h2>Your Jobs</h2>

    <table id="job-table">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</section>

</div>

<script src="js/jobTracker.js"></script>
<script src="js/app.js"></script>

</body>
</html>
