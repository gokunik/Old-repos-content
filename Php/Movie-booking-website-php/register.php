<?php

include 'database.php';

$_SESSION['register_flag']=0;

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    

$_SESSION['msg'] = array(
    "fname" => null,
    "lname" => null,
    "username" => null,
    "phone" => null,
    "email" => null,
    "pass" => null,
    "cpass" => null,
);



function check_string($string,$input,$mess)
{
    if(preg_match('/[^a-zA-Z]/',$string))
    {
       $_SESSION['msg'][$input] = "$mess";
       $_SESSION['register_flag']=1;
    }
}

function validate_username($str) 
{
    $allowed = array(".", "-", "_"); 
    if(!ctype_alnum(str_replace($allowed, '', $str ))) {
        $_SESSION['msg']['username'] = 'Username Invalid';
        $_SESSION['register_flag']=1;
    }
}

validate_username($username);

check_string($fname,'fname','First name can only Contain letters');
check_string($lname,'lname','last name can only Contain letters');

if(strlen($phone) !== 10 )
{
    $_SESSION['msg']['phone'] = "Phone number Lenght must be equal to 10 digits";
    $_SESSION['register_flag']=1;
}

if(strlen($pass)<6)
{
    $_SESSION['msg']['pass'] = "Password Lenght can not less then 6";
    $_SESSION['register_flag']=1;
}
elseif(strlen($pass)>16)
{
    $_SESSION['msg']['pass'] = "Password Lenght can not be more then 18";
    $_SESSION['register_flag']=1;
}
elseif(strcmp($pass,$cpass)!== 0)
{
    $_SESSION['msg']['cpass'] = "Confirm Password not same";
    $_SESSION['register_flag']=1;
}



$fname = ucfirst($fname);
$lname = ucfirst($lname);





if ($_SESSION['register_flag']) {

    header('location:index.php');
}
else
{
    
    $check = mysqli_query($con,"SELECT * FROM user_deatils WHERE username = '$username'");
    if(mysqli_num_rows($check))
    {
        $_SESSION['msg']['username'] ="Username already taken";
        header("location:index.php");
    }
    else
    {
    
    $query = "INSERT INTO user_deatils(fname,lname,username,phone,email,password)  VALUES('$fname','$lname','$username','$phone','$email','$pass')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['user'] = $username;
        $_SESSION['login_time_stamp'] = time();         
        $_SESSION['flag'] = 1;
        header("location:index.php");
    } else {
        echo "<script>alert('Can not execute, error ->" . mysqli_error($con) . "')</script>";
        echo "<script type='text/javascript'>
        document.location.href='index.php';}
        </script>
    ";
    }
    }
    
}

?>