<?php
include 'database.php';
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please Login First')</script>";
    echo "<script type='text/javascript'>
         document.location.href='loginPage.php'; 
        </script>
    ";
}
$username = $_SESSION['user'];
$display[] = array(
    'full_name' => null,
    'email' => null,
    'phone' => null,

);

$query = "SELECT * FROM user_details WHERE username = '$username' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)) {

    while ($fetch = mysqli_fetch_assoc($result)) {

        $display['full_name'] = $fetch['full_name'];
        $display['email'] = $fetch['email'];
        $display['phone'] = $fetch['phone'];
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php
    include 'bootstrapInclude.php';
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne+Mono&family=Ubuntu&display=swap');

        * {
            margin: 0px;
            padding: 0px;
        }

        .header {
            box-shadow: 0px 0px 5px grey;
            width: 100%;
            margin: 0px;
            z-index: 999;


        }

        .header h4 {
            font-family: 'Syne Mono', monospace;
            color: #16a085;
            font-weight: 600;
            margin: 0px;
            height: 100%;
            line-height: 38px;
            display: inline-block;


        }

        .nav-link {
            color: tomato;
            font-family: 'Ubuntu', sans-serif;
            display: inline-block;
            border-radius: 2px;
            transition: .2s;

        }

        .nav-link:hover {
            color: whitesmoke;
            background-color: #34495e;

        }

        .active {
            background-color: #34495e;
            color: whitesmoke;
        }

        .book-ticket {
            width: 480px;
            box-shadow: 0px 0px 10px grey;
            padding: 20px 30px;
            margin-top: 50px;
            margin-left: 550px;
        }
    </style>
</head>

<body>

    <div class="row header py-3 px-1">
        <div class="col-5 pl-5 ">
            <a href="index.php" style="text-decoration: none;">
                <h4>Book <span class="text-danger">MyCar</span></h4>
            </a>
        </div>

        <div class="col-5 ">
            <nav class="">
                <ul class="nav justify-content-end ">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="col-2 d-flex justify-content-center ">
            <?php
            if (isset($_SESSION['user'])) {
                echo '<div class="dropdown">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                  ' . $_SESSION['user'] . '
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php?flag=1">Logout</a>
                </div>
              </div>
            </div>';
            }
            ?>
        </div>
    </div>

    <?php
  if (isset($_SESSION['error_msg'])) {
    echo '
        <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong class="text-danger">* </strong> ' . $_SESSION['error_msg'] . '
        </div>
        ';
    unset($_SESSION['error_msg']);
  }
  ?>

    <div class="book-ticket">
        <div class="" style="text-align: center;">
            <h4 class="font-weight-bold">Book <span class="text-danger">Cab</span></h4>
        </div>
        <form action="book.php" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="username" id="" class="form-control" value="<?php echo $display['full_name'] ?>" disabled>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $display['email'] ?>" disabled>
            </div>

            <div class="form-group">
                <label for="">phone</label>
                <input type="number" class="form-control" name="phone" value="<?php echo $display['phone'] ?>" disabled>
            </div>

            <div class="form-group">
                <label for=""> Date </label>
                <input type="date" class="form-control" name="date" id="" required>
            </div>

            <div class="form-group">
                <label for=""> Driver </label>
                <select class="form-control " id="" name="driver" required>
                    <option>Select Driver</option>
                    <option value="Hanish-d100">Hanish</option>
                    <option value="Aman-d101">Aman</option>
                    <option value="Kaven-d102">Kaven</option>
                    <option value="Ankit-d103">Ankit</option>
                    <option value="Vinay-d104">Vinay</option>
                    <option value="Kartik-d105">Kartik</option>
                    
                </select>

            </div>

            <div class="form-group " style="margin-top: 20px;">
                <div class="d-flex justify-content-between">
                    <select class="form-control " id="" name="from" required style="width: 200px;">
                        <option>From</option>
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="haryana">Haryana</option>
                        <option value="punjab">Punjab</option>
                    </select>

                    <select class="form-control " id="" name="to" required style="width: 200px;">
                        <option> To </option>
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="haryana">Haryana</option>
                        <option value="punjab">Punjab</option>
                    </select>
                </div>
            </div>


            <div class="d-flex justify-content-center">
                
                <button type="submit" class="btn btn-success">
                Confirm Booking
                </button>
                
            </div>
            <div class="pb-1">

            </div>
        </form>
    </div>

</body>

</html>



<?php

if (isset($_SESSION['flag'])) {
    echo '<script>alert("Successfully Logged In")</script>';
    unset($_SESSION['flag']);
}
?>