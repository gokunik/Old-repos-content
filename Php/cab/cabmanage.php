<?php
include 'database.php';

$display[] = array();

if (isset($_POST['fetch'])) {
    $input = $_POST['input'];

    $query = "SELECT * FROM bookings WHERE user = '$input'  ||  driver_id = '$input' || from_ = '$input'   ";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)) {

        while ($fetch = mysqli_fetch_array($result)) {
            array_push($display, array(
                $fetch['user'],
                $fetch['driver'],
                $fetch['driver_id'],
                $fetch['date'],
                $fetch['from_'],
                $fetch['to_'],
            ));
        }
        $_SESSION['error_msg'] = "Record Fetched Successfully";
    } else {
        $_SESSION['error_msg'] = "No Record Found ";
    }
}

if (isset($_POST['delete'])) {
    $input2 = $_POST['input2'];

    $query = "DELETE FROM bookings WHERE user = '" . $input2 . "'  ||  driver_id = '" . $input2 . "' || from_ = '" . $input2 . "'   ";
    $result = mysqli_query($con, $query);

    if ($result) {

        if (mysqli_affected_rows($con) > 0) {
            $_SESSION['error_msg'] = "Record deleted";
        } else {
            $_SESSION['error_msg'] = "No Record Found to delete";
        }
    }
}

if (isset($_POST['cab'])) {

    $username = $_POST['username'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $driver = explode('-', $_POST['driver']);
    $driver_name = $driver[0];
    $driver_id = $driver[1];

    $check = mysqli_query($con, "SELECT username FROM user_details WHERE username = '$username' ");
    if (mysqli_num_rows($check)) {
        $query = "INSERT INTO bookings(user,driver,driver_id,date,from_,to_) VALUES('$username','$driver_name','$driver_id','$date','$from','$to')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['error_msg'] = 'Cab Booked successfully ';
        } else {
            $_SESSION['error_msg'] = 'Can not Book cab! error occurred';
        }

        $query2 = "UPDATE driver_details SET bookings = bookings+1 WHERE driver_id = '$driver_id' ";
        $query3 = "UPDATE user_details SET bookings = bookings+1 WHERE username = '$username' ";
        mysqli_query($con, $query2);
        mysqli_query($con, $query3);
    }
    else
    {
        $_SESSION['error_msg'] = 'User Not Found! Enter A valid User';
    }
}
?>

<head>
    <?php
    include 'bootstrapInclude.php';
    ?>
    <style>
        .card {
            width: 230px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['error_msg'])) {
        echo '
        <div class="container pt-4 ">
            <div class="alert alert-success alert-dismissible fade show w-50" style="margin: auto !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">*</strong> ' .  $_SESSION["error_msg"] . '
            </div>
        </div>
    ';
    }
    unset($_SESSION['error_msg']);
    ?>
    <section class="container mt-5 pt-5">
        <center>
            <div class=" d-flex justify-content-around">
                <div class="card">
                    <div class="card-body"><i class="fa fa-search fa-5x"></i></div>
                    <div class="card-footer">
                        <button type="button" class=" btn btn-info" data-toggle="modal" data-target="#check">
                            Check cab booking
                        </button></div>
                </div>

                <div class="card">
                    <div class="card-body"><i class="fa fa-address-card fa-5x"></i></div>
                    <div class="card-footer">
                        <button type="button" class=" btn btn-info" data-toggle="modal" data-target="#add">
                            Add cab booking
                        </button>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body"><i class="fa fa-trash fa-5x"></i></div>
                    <div class="card-footer">
                        <button type="button" class=" btn btn-info" data-toggle="modal" data-target="#remove">
                            Remove cab booking
                        </button>
                    </div>
                </div>




            </div>

        </center>
    </section>

    <div class="container mt-5" style="text-align: center;">
        <h1 class="text-danger">Fetched <span class="text-warning">Record</span></h1>
    </div>

    <div class="outer mt-5">
        <div class="container mt-5">
            <table class="table table-hover">
                <colgroup>
                    <col style="width: 16.666%;">
                    <col style="width: 16.666%;">
                    <col style="width: 16.666%;">
                    <col style="width: 16.666%;">
                    <col style="width: 16.666%;">
                    <col style="width: 16.666%;">
                </colgroup>
                <thead>
                    <tr>

                        <th>User Name</th>
                        <th>Driver Name</th>
                        <th>Driver Id</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!empty($display)) {
                        foreach ($display as $key => $value) {
                            echo "<tr>";
                            foreach ($value as $subkey => $subvalue) {
                                echo
                                    "
                                        <td>
                                        " . $subvalue . "
                                        </td>
                                    ";
                            }
                        }
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <! ----- first modal for checking cabs -->
        <div class="modal" id="check">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Check for cabs</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="sel1">Check Booking According To..</label>
                                <select class="form-control" id="select">
                                    <option value="not_selected">Please Select a option</option>
                                    <option value="driver">Fetch all booking of a driver</option>
                                    <option value="city">Fetch all booking of a city</option>
                                    <option value="user">Fetch all booking of a user</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Please select an option first" name="input" id="input" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info" name="fetch" id="fetchbtn"> Fetch Data</button>
                            </div>
                        </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <! ----- second modal for adding cabs -->
            <div class="modal" id="add">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Cab Booking</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="container" action="" method="POST">
                                <div class="form-group">
                                    <label for="">User</label>
                                    <input type="text" name="username" id="" class="form-control" placeholder="Enter User" required>
                                </div>

                                <div class="form-group">
                                    <label for=""> Date </label>
                                    <input type="date" class="form-control" name="date" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for=""> Driver </label>
                                    <select class="form-control " id="" name="driver" required>
                                        <option>Select Driver</option>
                                        <option value="Hanish-d100">Hanish </option>
                                        <option value="Aman-d101">Aman</option>
                                        <option value="Kaven-d102">Kaven</option>
                                        <option value="Ankit-d103">Ankit</option>
                                        <option value="Vinay-d104">Vinay</option>
                                        <option value="Kartik-d105">Kartik</option>

                                    </select>

                                </div>

                                <div class="form-group " style="margin-top: 25px;">
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
                                <div class="d-flex justify-content-center" style="margin-top: 30px;">

                                    <button type="submit" class="btn btn-info" name="cab">
                                        Confirm Booking
                                    </button>

                                </div>

                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <! ----- Third modal for removing cabs -->

                <div class="modal" id="remove">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Remove Cab booking</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="sel1">Delete Booking According To..</label>
                                        <select class="form-control" id="select2">
                                            <option value="not_selected">Please Select a option</option>
                                            <option value="driver">Delete all booking of a driver</option>
                                            <option value="city">Delete all booking of a city</option>
                                            <option value="user">Delete all booking of a user</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Please select an option first" name="input2" id="input2" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-info" name="delete" id="fetchbtn2"> Delete Data</button>
                                    </div>
                                </form>

                                <div class="container mt-3">
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong class="text-danger">Note*</strong> All the cab booked under the particular Record will be deleted
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

</body>

</html>

<script>
    var select = document.querySelector('#select');
    var input = document.querySelector('#input')
    var btn = document.querySelector('#fetchbtn')
    input.disabled = btn.disabled = true;
    select.addEventListener("input", cal);

    function cal() {
        if (select.value == 'driver') {
            input.placeholder = 'Enter Driver Id'
            input.disabled = btn.disabled = false;
        }
        if (select.value == 'user') {
            input.placeholder = 'Enter User Name'
            input.disabled = btn.disabled = false;
        }
        if (select.value == 'city') {
            input.placeholder = 'Enter City Name'
            input.disabled = btn.disabled = false;
        }
        if (select.value == 'not_selected') {
            input.placeholder = 'Please Select an option First'
            input.disabled = btn.disabled = true;
        }
    }

    var select2 = document.querySelector('#select2');
    var input2 = document.querySelector('#input2')
    var btn2 = document.querySelector('#fetchbtn2')
    input2.disabled = btn2.disabled = true;
    select2.addEventListener("input", cal2);

    function cal2() {
        if (select2.value == 'driver') {
            input2.placeholder = 'Enter Driver Id'
            input2.disabled = btn2.disabled = false;
        }
        if (select2.value == 'user') {
            input2.placeholder = 'Enter User Name'
            input2.disabled = btn2.disabled = false;
        }
        if (select2.value == 'city') {
            input2.placeholder = 'Enter City Name'
            input2.disabled = btn2.disabled = false;
        }
        if (select2.value == 'not_selected') {
            input2.placeholder = 'Please Select an option First'
            input2.disabled = btn2.disabled = true;
        }
    }
</script>