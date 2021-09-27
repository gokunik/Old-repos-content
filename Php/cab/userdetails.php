<?php
include 'database.php';


$display[] = array();

$button = '
    <button class="btn btn-danger" title="Warning" data-toggle="popover" data-trigger="hover" data-content="Record will be deleted permanently">
        Remove
    </button>
';

if (isset($_GET['username'])) {
    $user = $_GET['username'];
    $sql = "DELETE FROM user_details WHERE username = '$user'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['error_msg'] = "User Deleted From the Record" ;
    } else {
        $_SESSION['error_msg'] = "Can not Deleted Record! Some Error Occurred" ;
    }
}

$query = "SELECT * FROM user_details";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)) {

    while ($fetch = mysqli_fetch_array($result)) {
        array_push($display, array(
            $fetch['full_name'],
            $fetch['username'],
            $fetch['email'],
            $fetch['phone'],
            $fetch['city'],
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
        <h1 class="text-danger">User <span class="text-warning">Table</span></h1>
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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
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
                                    $username = $subvalue;
                                }

                                if ($subvalue === $button) {
                                    echo
                                        "
                                        
                                        <td>
                                        <a href='userdetails.php?username=$username' >
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