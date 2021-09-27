<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Logout Sucessfully')</script>";
echo "<script type='text/javascript'>
        document.location.href='index.php';
    </script>
    ";
?>