<?php
include 'database.php';
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}

?>
<?php
include 'data.php';
?>

<?php
$user = $_SESSION['user'];
$display[] = array();

$query = "SELECT * FROM booking_details WHERE user ='$user'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)) {
    $i = 0;
    $j = mysqli_num_rows($result);
    while ($fetch = mysqli_fetch_array($result)) {

        $orgDate = $fetch['date'];
        $newDate = date("d-m-Y", strtotime($orgDate));

        array_push($display, array(
            $j,
            $fetch['name'],
            $newDate,
            $fetch['time'],
            $fetch['no_of_tickets'],
            $fetch['price'] * $fetch['no_of_tickets']
        ));

        $i = $i + 1;
        $j = $j - 1;
    }
}

$display = array_reverse($display);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php
    include 'links.php';
    ?>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne+Mono&family=Ubuntu&display=swap');

    * {
        position: relative;
    }

    .title {
        font-family: 'Ubuntu', sans-serif;
    }

    .div-1::after {
        content: '';
        position: absolute;
        width: 2px;
        height: 74vh;
        right: 0;
        top: 80px;
        box-shadow: 0px 0px 5px grey;
        border-radius: 10px;
        background-color: #2ecc71;
    }

    .avatar {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .avatar img {
        border-radius: 50%;
        width: 150px;
        box-shadow: 0px 0px 10px grey;
    }

    .cont-1 {
        box-shadow: 0px 0px 2px grey;
        padding: 5px;
        margin: auto;
        margin-top: 15px;
        width: 230px;
        height: 200px;
    }

    .hr {
        width: 80%;
        margin: 20px auto 10px;

    }

    .table {
        box-shadow: 0px 0px 10px rgba(192, 192, 192, 0.6),
            0px 0px 50px rgba(192, 192, 192, 0.4);
        max-height: 1000px;

    }

    .alert-div {
        position: absolute;
        width: 100%;
        bottom: 40px;
    }

    .alert {
        margin: auto;
    }

    .div-1 
    {
        width: 1100px;
        padding: 0px 20px 50px 20px;
    }
    .div-2 
    {
        width: 400px;
        padding: 0px 15px 50px 15px;

}

@media screen and (max-width: 1499px) {
    .div-1::after{
    display:none;
  }
}
</style>

<body style="min-width:1200px">
    <?php
    include 'header.php';
    ?>
    <div class="parent d-flex justify-content-around flex-wrap">
        <div class=" div-1">
            <div class="container mt-4 title " style="text-align: center;">
                <h3>Your Bookings</h3>
            </div>

            <div class="bookings container mt-4 px-3 pt-3">
                <table class="table table-hover">
                    <colgroup>
                        <col style="width: 16.66666%;">
                        <col style="width: 16.66666%;">
                        <col style="width: 16.66666%;">
                        <col style="width: 16.66666%;">
                        <col style="width: 16.66666%;">
                        <col style="width: 16.66666%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>
                                S no.
                            </th>
                            <th>
                                Movie Name
                            </th>

                            <th>
                                Date
                            </th>
                            <th>
                                Time
                            </th>
                            <th>
                                No Of Tickets
                            </th>
                            <th>
                                Total Price
                            </th>
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
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" div-2">
            <div class="container mt-4 title " style="text-align: center;">
                <h3>Your Details</h3>
            </div>
            <div class="cont-1">
                <div class="avatar mt-2">
                    <img src="images/avatar.jpg" alt="">
                </div>

                <div class="container mt-2 " style="text-align: center;">
                    <h5>
                        <span class="badge badge-danger">
                            <?php
                            echo $user_data['username'];
                            ?>
                        </span>
                    </h5>
                </div>
            </div>

            <hr class="hr">

            <div class="px-5">
                <form action="update.php" method="POST" class="">
                    <div class="form-group">
                        <label for="pwd">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $user_data['username']; ?>" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must be Alpha Numeric and only contain [' . ' , ' - ' , ' _ '], no other character allowed">
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user_data['fname'] . ' ' . $user_data['lname']; ?>" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must not include special characters or numbers">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user_data['email']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">phone</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $user_data['phone']; ?>" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Number must be of 10 digit">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="alert-div">
        <?php
        if (isset($_SESSION['success_msg'])) {
            echo '<div class="alert alert-success alert-dismissible w-25">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">* </strong> ' . $_SESSION['success_msg'] . '
            </div>';
            unset($_SESSION['success_msg']);
        }
        ?>
    </div>

</body>
</html>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>