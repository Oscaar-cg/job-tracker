<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Traker & Resume Analyzer</title>
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


    <main>

        <p>Track your job applications and optimize your Resumer easily</p>
        
        <p class="video-text">Motivational Video: Watch and get inspired!</p>
        <div class="video-container">

            <iframe width="560" height="315" 
                src="https://www.youtube.com/embed/wy0MXRHOybE?si=mF7Lfc1T53GqNiZH" 
                title="YouTube video player" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>
        </div>
    </header>

    <!--How it works-->
    <section id="how-it-works" class="section-steps">
        <h2>How It Works</h2>
        <ol>
            <li><strong> Step 1:</strong> Add your job application to the tracker.</li>
            <li><strong> Step 2:</strong> Get reminders and track your progress.</li>
            <li><strong> Step 3:</strong> optimize your resume with our analyzer.</li>

        </ol>
    </section>

    <!--Features-->
    <section id="features">
        <h2>Features</h2>
        <ul>
            <li>Track all your job applications in one place</li>
            <li>Receive reminders for follow-ups</li>
            <li>Analyze and optimize your resume</li>
            <li>Easy-to-use dashboard</li>
        </ul>
    </section>

    <!--Get Started Section-->
    <section id="get-started" class="section-cta">
        <h2>Get Started</h2>
        <p>Click to start tracking your jobs or optimizing your resume!</p>
        <a href="tracker.php" class="btn">Go to Job Tracker</a>
        <a href="analyzer.php" class="btn">Go to Resume Analyzer</a>
    </section>

    <!--Reviews-->
    <section id="reviews" class="section-reviews">
        <h2>What Users Say</h2>
        <p>Comming soon: user reviews!</p>
    </section>
</main>

    <!--Footer-->
    <footer>
        <p>&copy; 2025 Job Tracker & Resume Analyzer. All rights reserved.</p>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>