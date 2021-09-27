<?php
session_start();

if (!isset($_SESSION['adminuser'])) {
    header('location:adminlogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
    include 'bootstrapInclude.php';
    ?>

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .row {
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw;
            height: 100vh;

        }

        .sec-1,
        .sec-2 {
            width: 100%;
            height: 100%;

        }

        .col-2,
        .col-10 {
            margin: 0px;
            padding: 0px;
        }

        .head {
            width: 100%;
            height: 10vh;
            position: relative;
        }

        .sec-1 .head {
            background-color: #f16a2d;
            box-shadow: -10px 0px 10px grey;
        }

        .sec-2>.head {

            box-shadow: 10px 0px 15px grey;
            border-left: 5px solid #ffd32a;
        }

        .body-1 {
            width: 100%;
            height: 90vh;
            background-color: #313541;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            padding-top: 20px;
        }

        .body-2 {
            width: 100%;
            height: 90vh;
            border-left: 5px solid #f16a2d;

        }

        .body-2 iframe {
            width: 100%;
            height: 90vh;
        }

        .side-menu {
            margin-top: 20px;
            list-style: none;
            width: 100%;

        }

        .side-menu li>a {
            text-decoration: none;
            display: inline-block;
            color: #76808f;
            line-height: 40px;
            font-size: 20px;
            font-weight: 500;
            margin-left: 58px;
        }

        .side-menu li:hover {
            background-color: white;
        }

        .side-menu li>a:hover {
            color: black;
        }

        .side-menu>.active {
            background-color: white;
            color: black;
        }

        .side-menu>.active>a {

            color: black;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-2 sec-1">
            <div class="head d-flex justify-content-center align-items-center text-white font-weight-bold">
                <h3>
                    Dashboard
                </h3>
            </div>
            <div class="body-1">
                <div class="side-heading">
                    <h4 class="text-danger">
                        Service Tool
                    </h4>
                </div>
                <ul class="side-menu">
                    <li class="active">
                        <a href="cabmanage.php" target="frame">Cab management</a>
                    </li>
                    <li>
                        <a href="userdetails.php" target="frame">User details</a>
                    </li>
                    <li>
                        <a href="cabdetails.php" target="frame">Booking details</a>
                    </li>
                    <li>
                        <a href="driverdetails.php" target="frame">Driver Details</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-10 sec-2">
            <div class="head row ">
                <div class="col-10 d-flex justify-content-center align-items-center">
                    <h3>
                        Cab Management Portal
                    </h3>
                </div>

                <div class="col-2 d-flex justify-content-center align-items-center">
                    <div class="dropdown dropleft">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['adminuser'] ?>
                        </button>
                        <div class="dropdown-menu mr-1">
                            <h5 class="dropdown-header">Logged In As <?php echo $_SESSION['adminuser'] ?></h5>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>

                        </div>
                    </div>
                </div>

            </div>

            <div class="body-2">
                <iframe src="cabmanage.php" name="frame" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $('ul.side-menu > li')
            .click(function(e) {
                $('ul.side-menu > li')
                    .removeClass('active');
                $(this).addClass('active');
            });
    });
</script>