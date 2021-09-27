<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Logout Sucessfully')</script>";
if(isset($_GET['flag']))
{
    echo "<script type='text/javascript'>
        document.location.href='loginPage.php';
    </script>
    ";
}
else
{
    echo "<script type='text/javascript'>
        document.location.href='adminlogin.php';
    </script>
    ";
}
