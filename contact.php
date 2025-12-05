<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <li><a class="active" href="contact.php">Contact</a></li>
    </ul>

    <ul class="navbar-right">
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>

<div class="contact-container">
    <h1>Contact Us</h1>
    <p class="contact-intro">If you have any questions, suggestions, or feedback, feel free to contact me using the form below.</p>

    <form class="contact-form">
        <label>Name</label>
        <input type="text" placeholder="Your name">

        <label>Email</label>
        <input type="email" placeholder="Your email">

        <label>Message</label>
        <textarea placeholder="Your message here..."></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

</body>
</html>