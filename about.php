<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
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
        <li><a class="active" href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
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

<div class="about-container">
    <h1>About This Project</h1>

    <p class="about-intro">
        This website was created to offer a simple and organized way for users to manage their job search.
        The goal was to build a practical tool that helps keep track of applications and understand how well a resume matches a job description.
    </p>

    <div class="about-sections">

        <div class="about-box">
            <h2>Why This Project Exists</h2>
            <p>
                Job searching can be confusing and overwhelming. Applications can be forgotten,
                and resumes often need to be adapted to each job. This project helps make the process clearer and more structured.
            </p>
        </div>

        <div class="about-box">
            <h2>How It Helps Users</h2>
            <ul>
                <li>Stay organized during their job search</li>
                <li>Store all applications in one place</li>
                <li>Compare resume and job description easily</li>
                <li>Use a clean and simple interface</li>
            </ul>
        </div>

        <div class="about-box">
            <h2>About the Creator</h2>
            <p>
                This project was designed and developed by a student learning full-stack web development,
                with the intention of building something functional, useful, and user-friendly.
            </p>
        </div>

    </div>
</div>

</body>
</html>