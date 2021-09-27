<?php
include 'database.php';
if (!isset($_SESSION['user'])) {
    header('location:index.php');
} 

$user = $_SESSION['user'];
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$price = $_SESSION['price'];
$date = $_POST['date'];
$time = $_POST['time'];
$ticket = $_POST['ticket'];

$query = "INSERT INTO booking_details(user,movie_id,name,price,date,time,no_of_tickets) VALUES('$user','$id','$name','$price','$date','$time','$ticket')";
$result = mysqli_query($con,$query);

if($result)
{
    $_SESSION['success_msg'] = "Ticket Booked Successfully" ;
    header('location:profile.php');
}
else
{
    $_SESSION['error_msg'] = "Failed ! some error occurred".mysqli_error($con);
    echo $_SESSION['error_msg'];
}

?>
