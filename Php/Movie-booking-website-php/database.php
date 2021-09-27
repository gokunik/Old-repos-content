<?php
session_start();
$con = new mysqli('localhost','root','','ca3');
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_SESSION['user'])) {
    if (time() - $_SESSION['login_time_stamp'] > 3600) {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}

?>