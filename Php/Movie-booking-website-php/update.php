<?php
include 'database.php';
$username = $_POST['username'];
$name = explode(" ",$_POST['name']);
$fname = $name[0];
$lname = $name[1];
$email = $_POST['email'];
$phone = $_POST['phone'];




    $check = mysqli_query($con,"SELECT * FROM user_deatils WHERE username = '$username'");
    if (mysqli_num_rows($check)) {
        if($_SESSION['user'] !==$_POST['username']) {
            $_SESSION['success_msg'] ="Username already taken";
            header("location:profile.php");
        } 
        else {
            $update = "UPDATE user_deatils SET fname='$fname', lname='$lname', username='$username', phone='$phone', email='$email' WHERE username='".$_SESSION['user']."'";

            if (mysqli_query($con, $update)) {
                $_SESSION['success_msg'] = "Record Updated successfully" ;
                header('location:profile.php');
            } else {
                $_SESSION['success_msg'] = "Error Occurred". mysqli_error($con) ;
                header('location:profile.php');
            }
        }
    }

?>