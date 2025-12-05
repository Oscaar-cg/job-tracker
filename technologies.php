<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Technologies</title>
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
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>

<h1>Technologies</h1>

<!-- Logo showcase for the assignment -->
<img src="images/logo1.svg" alt="logo"
     style="width:220px; display:block; margin:20px auto;">

<p style="text-align:center; margin-bottom:40px;">
    This page lists all the technologies used in my website.
</p>

<!-- XHTML -->
<section>
    <h2>XHTML</h2>
    <p>For this project, I tried to keep all my pages clean and structured the same way. Even if the site is built with HTML5, I followed a more XHTML-style approach by keeping tags properly nested, avoiding random spacing, closing everything correctly, and keeping the code readable. This helped me stay organized, especially when I started adding PHP, JavaScript and forms everywhere. Making sure the structure stayed clean made it easier to debug the pages when something broke.</p>
</section>

<!-- HTML5 -->
<section>
    <h2>HTML5</h2>
    <p>I used HTML5 to build the full layout of my site. All the main parts like the navigation bar, the header text, the sections, and the footer rely on HTML5 elements. It made the structure more clear and also allowed me to separate each part of the page logically. Since the project contains many pages, keeping everything consistent with HTML5 helped me navigate between files faster and avoid mistakes.</p>
</section>

<!-- HTML5 Canvas -->
<section>
    <h2>HTML5 Canvas Element</h2>
    <p>In my Resume Analyzer page, I used the HTML5 Canvas element to draw the match score circle. When the user pastes their resume and the job description, JavaScript analyzes the text and updates the canvas in real time. The circle fills based on the percentage match, so the user gets a visual result instead of just text. This was my first time using Canvas and it made the page feel more modern and interactive.</p>
</section>

<!-- HTML5 Video -->
<section>
    <h2>HTML5 Video Element</h2>
    <p>On the homepage, I added a motivational YouTube video using the HTML5 iframe method. My goal was to make the site feel less empty and give users something helpful or inspiring when they first arrive. It also shows that I can use media elements inside a webpage, not just text and forms. The video stays responsive so it works on smaller screens too.</p>
</section>

<!-- CSS -->
<section>
    <h2>CSS</h2>
    <p>I used CSS everywhere in my project to make the pages look cleaner and more modern. I used gradients, shadows, spacing, and animations to improve the design. CSS also allowed me to build a navigation bar that stays at the top (sticky), style the forms, add animations to buttons, and create a consistent theme across all pages. Making the CSS responsive helped the site stay usable even when the screen size changes.</p>
</section>

<!-- JavaScript -->
<section>
    <h2>JavaScript</h2>
    <p>I used regular JavaScript to control smaller interactions in the site, like updating text, showing or hiding elements, handling button clicks, or reading uploaded files. It helped the site feel more dynamic. For example, it reacts when users upload a resume, validates inputs, and improves the flow of the pages without needing to reload everything.</p>
</section>

<!-- Dynamic JavaScript -->
<section>
    <h2>Dynamic JavaScript</h2>
    <p>Dynamic JavaScript is one of the biggest parts of my project. In my Job Tracker page, all the jobs the user adds appear instantly in the table using JS, without reloading the page. The same applies for deleting jobs or updating the status. In the Resume Analyzer, JavaScript reads the text, analyzes keywords, and shows results immediately. This makes the site much smoother and gives a real “app-like” feeling instead of a static website.</p>
</section>

<!-- PHP -->
<section>
    <h2>PHP</h2>
    <p>PHP controls the back-end of my project. I used it to manage login, registration, sessions, and database interaction. It verifies emails, hashes passwords, and protects specific pages. Without PHP, the entire authentication system and connection to MySQL would not work.</p>
</section>

<!-- Database -->
<section>
    <h2>Database</h2>
    <p>I created a MySQL database to store users and job applications. The database contains the user table for the authentication system and a jobs table for the Job Tracker. PHP communicates with MySQL to insert, update, and delete data. This allows users to have their own account and save their jobs privately. It also helped me understand how back-end data works together with the front-end.</p>
</section>

<!-- SVG Logo -->
<section>
    <h2>SVG Logo</h2>
    <p>For this assignment, I created a custom SVG logo and used it in two different sizes to show how flexible it is. I used the small version as the favicon so the logo appears in the browser tab. I also displayed a larger version on my Technologies page to demonstrate how SVGs stay sharp at any size. This allowed me to add a personal branding touch to my project while also completing the requirement of showing the SVG in multiple sizes.</p>

    <!-- Large -->
    <img src="images/logo1.svg" alt="Large Logo"
         style="width:200px; display:block; margin:10px auto;">

    <!-- Small -->
    <img src="images/logo1.svg" alt="Small Logo"
         style="width:60px; display:block; margin:10px auto;">
</section>

<!-- Web Server -->
<section>
    <h2>Web Server</h2>
    <p>The entire project runs on XAMPP using Apache. This allowed me to test PHP, work with MySQL, and handle sessions as if the site was running on a real server. XAMPP made it easier to preview the website locally and check that all the pages, queries, and login features were working correctly.</p>
</section>

<!-- XHTML Validation -->
<section>
    <h2>XHTML Validation</h2>
    <p>I used the W3C Validator to make sure my pages were structured correctly. This helped me spot small mistakes like missing tags, unclosed elements, or small formatting issues. Fixing these made my pages cleaner and ensured that everything followed good web development practices.</p>
</section>

<div id="menu-placeholder"></div>

</body>
</html>