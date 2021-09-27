<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <?php
  include 'bootstrapInclude.php';
  ?>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Syne+Mono&family=Ubuntu&display=swap');

    .header {
      background-color: white;
      width: 100%;
      height: 70px;
      box-shadow: 0px 0px 5px grey;
      text-align: center;
    }

    .header>h4 {
      font-family: 'Syne Mono', monospace;
      color: #16a085;
      font-weight: 600;
      margin: 0px;
      height: 100%;
      line-height: 70px;
      display: inline-block;
    }
  </style>
</head>

<body>

  <div class="header">
    <h4>Book <span class="text-danger">MyCar</span></h4>
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
  <div class="container h-100 log-div">
    <div class="row h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 m-auto">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
          <div class="card my-3 w-100 shadow example-card" id="example-card">
            <div class="card-header bg-dark">
              <ul class="nav nav-pills card-header-pills" id="example-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="example-login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="example-login" aria-selected="true"><i class="fa fa-lock"></i> Log In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="example-register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="example-register" aria-selected="false"><i class="fa fa-user-plus"></i> Create an account</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="example-tab-content">
                <div class="tab-pane show fade active" id="login" role="tabpanel" aria-labelledby="example-login-tab">
                  <form action="login.php" method="POST">
                    <div class="form-group text-center">
                      <h3>Login to your account</h3>
                      <p>Please enter your login information below</p>
                    </div>
                    <div class="form-group">
                      <label for="login_email"><i class="fa fa-user"></i> User Name</label>
                      <input type="text" class="form-control" id="login_email" placeholder="Enter Name" name="username" required />
                    </div>

                    <div class="form-group">
                      <label for="login_password"><i class="fa fa-lock"></i> Password</label>
                      <input type="password" class="form-control" id="login_password" placeholder="Enter password" name="pass" required />
                    </div>
                    <div class="form-group">
                      <p><a href="#">Trouble signing in?</a></p>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="login">
                        Log in
                      </button>
                    </div>

                  </form>
                </div>
                <div class="tab-pane fade nav-rotate" id="register" role="tabpanel" aria-labelledby="example-register-tab">
                  <form action="register.php" method="POST">
                    <div class="form-group">
                      <label for="register_email"><i class="fa fa-user"></i> Full Name</label>
                      <input type="text" class="form-control" placeholder="Full Name" name="full_name" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must not include special characters or numbers" />
                    </div>

                    <p class="text-danger">
                      <?php
                      if (isset($_SESSION['msg']['fname'])) {
                        echo "* " . $_SESSION['msg']['fname'];
                        unset($_SESSION['msg']['fname']);
                      }
                      ?>
                    </p>

                    <div class="form-group">
                      <label for="register_email"><i class="fa fa-user"></i> Username</label>
                      <input type="text" class="form-control" placeholder="User Name" name="username" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Must be Alpha Numeric and only contain [' . ' , ' - ' , ' _ '], no other character allowed" />
                    </div>

                    <p class="text-danger">
                      <?php
                      if (isset($_SESSION['msg']['username'])) {
                        echo "* " . $_SESSION['msg']['username'];
                        unset($_SESSION['msg']['username']);
                      }
                      ?>
                    </p>

                    <div class="form-group">
                      <label for="register_email"><i class="fa fa-envelope"></i> Email address</label>
                      <input type="email" class="form-control" placeholder="Email address" name="email" required />
                    </div>

                    <p class="text-danger">
                      <?php
                      if (isset($_SESSION['msg']['email'])) {
                        echo "* " . $_SESSION['msg']['email'];
                        unset($_SESSION['msg']['email']);
                      }
                      ?>
                    </p>

                    <div class="form-group">
                      <label for="register_email"><i class="fa fa-phone"></i> Phone</label>
                      <input type="number" class="form-control" placeholder="Phone" name="phone" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="Number must be of 10 digit" />
                    </div>
                    <p class="text-danger">
                      <?php
                      if (isset($_SESSION['msg']['phone'])) {
                        echo "* " . $_SESSION['msg']['phone'];
                        unset($_SESSION['msg']['phone']);
                      }
                      ?>
                    </p>

                    <div class="form-group">
                      <div class="form-group">
                        <label for="select_city"><i class="fa fa-map-marker" aria-hidden="true"></i> Select city </label>
                        <select class="form-control" id="select_city" name="city" required>
                          <option value="delhi">Delhi</option>
                          <option value="mumbai">Mumbai</option>
                          <option value="haryana">Haryana</option>
                          <option value="punjab">Punjab</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="register_password"><i class="fa fa-lock"></i> Password</label>
                      <input type="password" class="form-control" id="register_password" placeholder="Choice password" name="pass" required data-toggle="popover" data-trigger="focus" title="Required Condition" data-content="length must be equal to or more then 6 " />
                    </div>

                    <p class="text-danger">
                      <?php
                      if (isset($_SESSION['msg']['pass'])) {
                        echo "* " . $_SESSION['msg']['pass'];
                        unset($_SESSION['msg']['pass']);
                      }
                      ?>
                    </p>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="register">
                        Create my account
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  $(document).ready(function() {
    $('[data-toggle="popover"]').popover();
  });
</script>
<?php
if (isset($_SESSION['register_flag'])) {
  if ($_SESSION['register_flag']) {
    echo "<script>
  $('#example-register-tab').tab('show')
  </script>";
    $_SESSION['register_flag'] = 0;
  }
}
?>