<?php
include 'database.php';


$display[] = array();

$button = '
    <button class="btn btn-danger" title="Warning" data-toggle="popover" data-trigger="hover" data-content="Record will be deleted permanently">
        Remove
    </button>
';

if (isset($_GET['driver_id'])) {
    $driver_id = $_GET['driver_id'];
    $sql = "DELETE FROM driver_details WHERE driver_id = '$driver_id'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['error_msg'] = "Entry Deleted From the Record" ;
    } else {
        $_SESSION['error_msg'] = "Can not Deleted Record! Some Error Occurred" ;
    }
}

$query = "SELECT * FROM driver_details";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)) {

    while ($fetch = mysqli_fetch_array($result)) {
        array_push($display, array(
            $fetch['name'],
            $fetch['driver_id'],
            $fetch['email'],
            $fetch['bookings'],
            $button
        ));
    }
}
?>

<head>
    <?php
    include 'bootstrapInclude.php';
    ?>

    <style>
        .table {
            box-shadow: 0px 0px 10px grey;
            text-align: center;
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
    <div class="container mt-5" style="text-align: center;">
        <h1 class="text-danger">Driver <span class="text-warning">Details</span></h1>
    </div>
    <div class="outer mt-5">
        <div class="container mt-5">
            <table class="table table-hover">
                <colgroup>
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Driver Id</th>
                        <th>Email</th>
                        <th>Total Bookings</th>
                        <th>Remove</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!empty($display)) {
                        foreach ($display as $key => $value) {
                            echo "<tr>";
                            foreach ($value as $subkey => $subvalue) {

                                if ($subkey == 1) {
                                    $driver_id = $subvalue;
                                }

                                if ($subvalue === $button) {
                                    echo
                                        "
                                        
                                        <td>
                                        <a href='driverdetails.php?driver_id=$driver_id' target='frame' >
                                        " . $subvalue . "
                                        </a>
                                        </td>
                                        
                                    ";
                                } else {
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
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>