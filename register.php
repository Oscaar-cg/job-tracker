<?php
session_start();
include "database.php";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// check si email existe déjà
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: tracker.php?error=email_exists&form=register");
    exit();
}

// hash du password
$hash = password_hash($password, PASSWORD_DEFAULT);

// insertion
$stmt2 = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $username, $email, $hash);
$stmt2->execute();

// login auto
$_SESSION['username'] = $username;

header("Location: tracker.php");
exit();
?>
