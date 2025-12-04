<?php
session_start();
session_unset();//delete vriable of session
session_destroy();//destroy all the session

header("Location: login.php");//go back to connection page
exit();
?>