<?php

if(isset($_SESSION['user']))
{
    $query = "SELECT * FROM user_deatils WHERE username ='" . $_SESSION['user'] . "' ";
    $re = mysqli_query($con, $query);
     if (mysqli_num_rows($re)) {
    $data = mysqli_fetch_array($re);
    $user_data = array(
        "fname" => $data['fname'],
        "lname" => $data['lname'],
        "username" => $data['username'],
        "phone" => $data['phone'],
        "email" => $data['email']
    );
}
}

?>