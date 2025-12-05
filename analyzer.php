<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // check si user co
?>

<?php include "components/modal.php"; ?> <!-- popup -->

<?php
// open popup auto si pas co
if (!$isLoggedIn) {
    echo "<script>window.onload = () => openAuthModal();</script>";
}

// open popup si erreur login/register
if (isset($_GET['error'])) {
    echo "<script>
        window.onload = () => {
            openAuthModal();
            if ('".$_GET['error']."' === 'email_exists') {
                showRegister();
            }
            if ('".$_GET['error']."' === 'wrong_password' || '".$_GET['error']."' === 'user_not_found') {
                showLogin();
            }
        };
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume Analyzer</title>
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
                <!-- user co -->
                <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION['username']); ?></a></li>
                <li><a href="logout.php">Logout</a></li>

            <?php else: ?>
                <!-- open popup instead of login.php/register.php -->
                <li><a href="#" onclick="openAuthModal(); showLogin();">Login</a></li>
                <li><a href="#" onclick="openAuthModal(); showRegister();">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- lock message -->
    <?php if (!$isLoggedIn): ?>
        <div class="lock-message">
            <p>You need to login or create an account to use this feature.</p>
        </div>
    <?php endif; ?>

    <!-- content (blur si pas co) -->
    <div class="page-content <?php if (!$isLoggedIn) echo 'locked'; ?>">

        <header>
            <h1>Resume Analyzer</h1>

            <div id="language-selector">
                <label for="lang_select"><strong>🌍 Language:</strong></label>
                <select id="lang_select">
                    <option value="en" selected>English</option>
                    <option value="fr">Français</option>
                    <option value="es">Español</option>
                </select>
            </div>

            <p class="home-intro-text">Paste your resume below and get instant feedback!</p>
        </header>

        <section id="resume_section">
            <form id="resume_form">
                <!--Upload resume-->
                <label for="resume_file">Upload your resume:</label>
                <input type="file" id="resume_file" name="resume_file" accept="pdf, .doc, .docx, .txt">
                <p id="upload_message"></p>

                <!--Textarea-->
                <label for="resume_text">Paste your resume:</label>
                <textarea id="resume_text" name="resume_text" rows="10" placeholder="Paste your resume here!"></textarea>

                <!--submit button-->
                <button type="submit">Analyze Resume</button>
            </form>
        </section>

        <section id="result_section">
            <h2>Analysis Result</h2>
            <div id="result_details"></div>
        </section>

        <section id="job_match_section">
            <h2>Resume vs Job Description Match</h2>

            <label for="job_text">Paste Job Description:</label>
            <textarea id="job_text" rows="8" placeholder="Paste the job Description here..."></textarea>

            <button id="compare_button">Compare Resume with Job</button>

            <div id="match_result">
                <canvas id="match_circle" width="200" height="200"></canvas>
                <p id="match_score_text"></p>
                <div id="match_details"></div>
            </div>
        </section>

    </div>

    <script src="js/pdfJs/pdf.min.js"></script>
    <script src="js/analyzer.js"></script>
    <script src="js/app.js"></script>

</body>
</html>
