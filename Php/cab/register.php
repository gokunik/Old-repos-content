<?php

include 'database.php';

$_SESSION['register_flag']=0;

    $fname = $_POST['full_name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $city = $_POST['city'];
    

$_SESSION['msg'] = array(
    "fname" => null,
    "username" => null,
    "phone" => null,
    "email" => null,
    "pass" => null,
    "city" => null,
);




    if(preg_match('/[^a-zA-Z\s]/',$fname))
    {
       $_SESSION['msg']['fname'] = "First name can only Contain letters";
       $_SESSION['register_flag']=1;
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

$fname = ucfirst($fname);



    $check = mysqli_query($con,"SELECT * FROM user_details WHERE username = '$username' || email='$email'");
    if(mysqli_num_rows($check))
    {
        $fetch = mysqli_fetch_array($check);

        if($fetch['username'] === $username)
        {
            $_SESSION['msg']['username'] ="Username already taken";
            $_SESSION['register_flag']=1;
        }
        if($fetch['email'] === $email)
        {
            $_SESSION['msg']['email'] ="Email already Exists";
            $_SESSION['register_flag']=1;
        }
    }

if ($_SESSION['register_flag']) {

    header('location:loginPage.php');
}
else
{
    $query = "INSERT INTO user_details(full_name,username,password,email,phone,city)  VALUES('$fname','$username','$pass','$email','$phone','$city')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['user'] = $username;        
        $_SESSION['flag'] = 1;
        header("location:index.php");
    } else {
        $_SESSION['error_msg'] = 'Can not register error occurred';
        echo "<script>
        document.location.href='loginPage.php';
        </script>
    ";
    }

    
}
