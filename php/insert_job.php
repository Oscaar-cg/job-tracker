<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $title = $_POST['title'];
    $company = $_POST['company'];
    $status = $_POST['status'];

    $sql = "INSERT INTO jobs (title, company, status) VALUES ('$title', '$company', '$status')";

    if($conn ->query($sql)=== TRUE) {
        echo "Job successfully added!";
    }else{
        echo "Error : "  . $conn->error;
    }
}
?>