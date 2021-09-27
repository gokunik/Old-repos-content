<?php

include 'database.php';

$username = $_SESSION['user'];
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];
$driver = explode('-',$_POST['driver']);
$driver_name = $driver[0];
$driver_id = $driver[1];

$query = "INSERT INTO bookings(user,driver,driver_id,date,from_,to_) VALUES('$username','$driver_name','$driver_id','$date','$from','$to')";
$result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['error_msg'] = 'Cab Booked successfully ';
        echo "<script>
        document.location.href='index.php';
        </script>
    ";
    } else {
        $_SESSION['error_msg'] = 'Can not Book cab! error occurred';
        echo "<script>
        document.location.href='index.php';
        </script>
    ";
    }

$query2 = "UPDATE driver_details SET bookings = bookings+1 WHERE driver_id = '$driver_id' ";
$query3 = "UPDATE user_details SET bookings = bookings+1 WHERE username = '$username' ";
mysqli_query($con,$query2);
mysqli_query($con,$query3);



