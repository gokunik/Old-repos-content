<?php
include 'database.php';

$display[] = array();

$button = '
    <button class="btn btn-danger" title="Warning" data-toggle="popover" data-trigger="hover" data-content="Record will be deleted permanently">
        Remove
    </button>
';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE id = '$id'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['error_msg'] = "Entry Deleted From the Record" ;
    } else {
        $_SESSION['error_msg'] = "Can not Deleted Record! Some Error Occurred" ;
    }
}

$query = "SELECT * FROM bookings";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)) {

    while ($fetch = mysqli_fetch_array($result)) {
        array_push($display, array(
            $fetch['id'],
            $fetch['user'],
            $fetch['driver'],
            $fetch['driver_id'],
            $fetch['date'],
            $fetch['from_'],
            $fetch['to_'],
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
        <h1 class="text-danger">Booking<span class="text-warning">Table</span></h1>
    </div>
    <div class="outer mt-5">
        <div class="container mt-5">
            <table class="table table-hover">
                <colgroup>
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                    <col style="width: 14.285%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Driver Name</th>
                        <th>Driver Id</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Remove</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!empty($display)) {
                        foreach ($display as $key => $value) {
                            echo "<tr>";
                            foreach ($value as $subkey => $subvalue) {

                                if ($subkey == 0) {
                                    $id = $subvalue;
                                }

                                else if ($subvalue === $button) {
                                    echo
                                        "
                                        
                                        <td>
                                        <a href='cabdetails.php?id=$id' target >
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