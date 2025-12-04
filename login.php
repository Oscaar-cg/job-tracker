<?php
session_start();
include 'php/connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    $password =$_POST['password'];

    //Request to find the user
    $sql ="SELECT * FROM users Where email='$email'";//request to find user with email
    $result =$conn->query($sql);

    if($result->num_rows > 0) {//if we find the user
        $row =$result->fetch_assoc();//get info of the line
        if (password_verify($password, $row['password'])) { //compare password with the one stocké
            //stoke les info
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id']=$row['id'];
            $_SESSION['profil_pic']=$row['profil_pic'];
            header("Location: index.php");//sent to main page
            exit();

        } else {
            echo "Wrong password!";
        }
    } else {
        echo "No account found for this email.";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTC-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>login</h1>

    <?php
    //Display error msg if needed
    if(isset($error)) {
        echo"<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="POST" action="">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"required><br><br>

        <button type="submit">Login</button>
    </form>

    <p> Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>