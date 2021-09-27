<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php
    include 'bootstrapInclude.php';
    ?>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            background-color: #e2e2e2;
        }

        .card {
            width: 350px;
            margin: 100px auto !important;
            box-shadow: 0px 10px 20px grey;
        }
    </style>
</head>

<body>
    <div class="container" style="text-align: center; margin-top:100px">
        <h1>Login To Your <span class="text-danger">Admin</span> <span class="text-warning">Panel</span></h1>
    </div>

    <div class="container">
        <div class="card ">
            <div class="card-header" style="text-align: center;  font-weight: 500;">Admin Login</div>
            <div class="card-body">
                <form action="form_redirect.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                    </div>

                    <div class="d-flex justify-content-center mb-2">
                        <button type="submit" class="btn text-white" style="background-color: #37a69b; font-weight: 500; " name="login">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['error_msg'])) {
        echo '
        <div class="container ">
            <div class="alert alert-success alert-dismissible fade show w-50" style="margin: auto !important;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">*</strong> ' .  $_SESSION["error_msg"] . '
            </div>
        </div>
    ';
    }
    unset($_SESSION['error_msg']);
     ?>
</body>

</html>