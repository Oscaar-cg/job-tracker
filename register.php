<?php
include  'php/connect.php'; //connect to mysql
if ($_SERVER["REQUEST_METHOD"]=="POST"){//ensure that the survey has been sent
    $username = $_POST['username'];// get the user name
    $email=$_POST['email'];//get the email
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);//crypt password

// Check if email already exists
$checkEmail = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($checkEmail);

if ($result->num_rows > 0) {
    echo "<p style='color:red;'> This email is already registered. Please <a href='login.php'>login</a> instead.</p>";
} else {
    // Insert new user
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'> Registration successful! You can now <a href='login.php'>login</a>.</p>";
    } else {
        echo "<p style='color:red;'> Error: " . $conn->error . "</p>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTC-8">
    <title>Register</title>
     <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Create an Account</h1>

    <form method="POST" action=""><!--create form, post tell php to send info in the same page-->
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label> Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>