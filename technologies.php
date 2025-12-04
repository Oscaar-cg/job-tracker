<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Technologies</title>
    <link rel="stylesheet" href="css/styles.css">
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
             <!--Display the name of user connected-->
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>

<h1>technologies</h1>
<p>Comming soon Technologies....</p>

<div id="menu-placeholder"></div>
</body>
</html>