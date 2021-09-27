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

    .ctm-btn > button {
        width: 85px;
        display: block;
        border: none;
    }

    .btn:focus,
    .btn:active {
        outline: none !important;
        box-shadow: none !important;
    }

    .row {
        margin: 0px;
    }
</style>


<body>
    <div class="row header py-3 px-1">
        <div class="col-5 pl-5 ">
            <a href="index.php" style="text-decoration: none;">
                <h4>Movie Master</h4>
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
                  <a class="dropdown-item" href="profile.php">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>
            </div>';
            } else {
                echo '
                <div class="btn-group ctm-btn">
                <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#login-modal">
                    Login
                </button>
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#register-modal">
                    Register
                </button>
            </div>';
            }
            ?>
        </div>
    </div>

    <!-- login Modal starts from here -->

    <div class="modal" id="login-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container ">
                        <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username" required>

                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>

                            <div>
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
                            </div>

                            <div class="mb-3">
                                <a href=""> forget Password ?</a>
                            </div>

                            <div class="modal-footer justify-content-center pb-0">
                                <button type="submit" class="btn btn-danger" name="login">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login modal end here  -->

    <!-- Register Modal Start from here -->

    <div class="modal" id="register-modal">
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container ">
                        <form action="register.php" method="POST" id="reg">

                            <!-- first name -->
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="First name" name="fname" required value="" data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must not include special characters, numbers or whitespaces">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['fname'])) {
                                        echo "* " . $_SESSION['msg']['fname'];
                                        unset($_SESSION['msg']['fname']);
                                    }
                                    ?>
                                </p>
                            </div>


                            <!-- last name -->
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="last name" name="lname" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must not include special characters, numbers or whitespaces">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['lname'])) {
                                        echo "* " . $_SESSION['msg']['lname'];
                                        unset($_SESSION['msg']['lname']);
                                    }
                                    ?>
                                </p>
                            </div>

                            <!-- User name -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must be Alpha Numeric and only contain [' . ' , ' - ' , ' _ '], no other character allowed">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['username'])) {
                                        echo "* " . $_SESSION['msg']['username'];
                                        unset($_SESSION['msg']['username']);
                                    }
                                    ?>
                                </p>
                            </div>

                            <!-- Phone Number -->
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="phone Number"  name="phone" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Number must be of 10 digit">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['phone'])) {
                                        echo "* " . $_SESSION['msg']['phone'];
                                        unset($_SESSION['msg']['phone']);
                                    }
                                    ?>
                                </p>
                            </div>

                            <!-- email -->
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 42px;"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['email'])) {
                                        echo "* " . $_SESSION['msg']['email'];
                                        unset($_SESSION['msg']['email']);
                                    }
                                    ?>
                                </p>
                            </div>

                            <!-- Password -->
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="pass" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="length must be equal to or more then 6 ">
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['pass'])) {
                                        echo "* " . $_SESSION['msg']['pass'];
                                        unset($_SESSION['msg']['pass']);
                                    }
                                    ?>
                                </p>
                            </div>

                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" required>
                            </div>
                            <div class="mb-3">
                                <p class="text-danger">
                                    <?php
                                    if (isset($_SESSION['msg']['cpass'])) {
                                        echo "* " . $_SESSION['msg']['cpass'];
                                        unset($_SESSION['msg']['cpass']);
                                    }
                                    ?>
                                </p>
                            </div>


                            <div class="modal-footer justify-content-center pb-0">
                                <button type="submit" class="btn btn-danger" name="register">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
