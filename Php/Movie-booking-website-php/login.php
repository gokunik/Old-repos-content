<?php
include 'database.php';

$_SESSION['login_flag']=0;

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM user_deatils WHERE username = '$username' && password = '$pass'";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
        echo "<script>alert(".mysqli_error($con).")</script>";
    }
    if(mysqli_num_rows($result))
    {
        $_SESSION['user'] = $username;
        $_SESSION['login_time_stamp'] = time(); 
        $_SESSION['flag']=1;
        header("location:index.php");
    }
    else
    {
        $_SESSION['login_flag'] = 1;
        $_SESSION['error_msg'] = "Incorrect Username or Password" ;
    }

    if($_SESSION['login_flag'])
    {
        header("location:index.php");
    }
}

?>