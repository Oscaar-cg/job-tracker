<?php
session_start();
include "database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = $conn->prepare("SELECT * FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    header("Location: tracker.php?error=user_not_found");
    exit();
}

if (!password_verify($password, $user['password'])) {
    header("Location: tracker.php?error=wrong_password");
    exit();
}

$_SESSION['username'] = $user['username'];
header("Location: tracker.php");
exit();
?>
