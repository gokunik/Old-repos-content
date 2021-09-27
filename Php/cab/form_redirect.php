<?php
include 'database.php';
$_SESSION['login_flag']=0;

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM admin_details WHERE username = '$username' && password = '$pass'";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
        echo "<script>alert(".mysqli_error($con).")</script>";
    }
    else if(mysqli_num_rows($result))
    {
        $_SESSION['adminuser'] = $username;
        header("location:dashboard.php");
    }
    else
    {
        $_SESSION['login_flag'] = 1;
        $_SESSION['error_msg'] = "Incorrect Username or Password" ;
    }

    if($_SESSION['login_flag'])
    {
        header("location:adminlogin.php");
    }
}


?>