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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Tracker</title>
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
        <?php if ($isLoggedIn): ?>
            <!-- user co -->
            <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>

        <?php else: ?>
            <!-- open popup pas page login -->
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
    <p>Keep track of all your job applications in one place!</p>
</header>

<section id="add-job">
    <h2>Add a Job</h2>

    <!-- job form -->
    <form id="jobForm">
        <label for="job-title"> Job Title:</label>
        <input type="text" id="job-title" name="job-title" placeholder="Enter job title" required>

        <label for="company"> Company:</label>
        <input type="text" id="company" name="company" placeholder="Enter company name" required>

        <label for="status">Application Status:</label>
        <select id="status" name="status">
            <option value="Applied"> Applied</option>
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
        <tbody>
            <!-- jobs js -->
        </tbody>
    </table>
</section>

</div>

<!-- scripts -->
<script src="js/jobTracker.js"></script>
<script src="js/app.js"></script>

</body>
</html>