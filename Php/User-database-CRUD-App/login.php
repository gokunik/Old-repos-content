<?php
session_start();

$flag = 0;
$mes = "";

if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "ecom");
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sq = "select * from login where name = '$user' && pass = '$pass'";
    $result = mysqli_query($con, $sq);
    $num = mysqli_num_rows($result);
    if ( $num == 1 ) {
        header('location:index.php');
    } else {
        $mes =" Wrong User name or password";
    }
}

?>

<html>
<head>
    <title>login</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
}

body {
    background-image: url("images/h1_hero.jpg");
    width: 100%;
    height: 100vh;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header {
    width: 100%;
    height: 140px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 10px;

}

.header img  {
    block-size: 100px;
    margin: 15px 0px;
    
}

.sec-2 h2
{
    font-family: Arial, Helvetica, sans-serif;
}

.parent-cont {
    width: 30rem;
    height: 35rem;
    background-color: white;
    position: absolute;
    border-radius: 1rem;
    box-shadow: 0px 0px 5px 1px rgba(72, 84, 96, 1.0);
    transition: .5s;
    margin: auto;
}

.parent-cont:hover {
    transition: .5;
    transform: scale(1.02);
}

.child-cont {
    width: 80%;
    height: 100%;
    margin: auto;
}

.form-cont {
    width: 100%;
    height: 50%;
    margin-top: 10px;
}

.form {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.form .input {
    flex-basis: 50%;
}

.input p {
    font-family: verdana;
    font-size: 1.3rem;
    color: dimgray;
    padding: 5px;
}

.input input[type="text"],
input[type="password"] {
    width: 100%;
    height: 2.5rem;
    margin: .3rem auto;
    margin-bottom: 1rem;
    border: none;
    border-radius: 6px;
    box-shadow: 0px 0px 3px 1px grey;
    transition: 350ms;
}

.input input:hover {
    box-shadow: 0px 0px 6px 2px grey;
    transform: scale(1.02);
}

.input input:focus {
    border-left: 5px solid #2ecc71;
    border-right: 5px solid #2ecc71;
}

.input input[placeholder] {
    font-size: 1.3rem;
    opacity: 0.6;
    padding-left: 10px;
    color: tomato;
}

.login-btn input {
    width: 100%;
    height: 2.5rem;
    margin-top: 10px;
    font-family: verdana;
    font-size: 1.2rem;
    color: white;
    background-color: #353b48;
    border: none;
    border-radius: 4px;
    box-shadow: 0px 0px 3px 1px white;
    transition: 500ms;
}

.login-btn input:hover {
    box-shadow: 0px 0px 4px 1px grey;
    background-color: #2ecc71;
    border-bottom: 2px solid #353b48;
}

.forget-pass {
    width: 100%;
}

.forget-pass a {
    display: block;
    color: #8c7ae6;
    width: 50%;
    height: 1rem;
    margin: auto;
    text-align: center;
    font-size: 1.1rem;
    margin-top: 1.5rem;
}

.err {
    margin-top: 35px;
    color: red;
    font-weight: bold;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.err {
    margin-top: 35px;
    color: red;
    font-weight: bold;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
</style>

<body>
    
    <div class="parent-cont">
        <div class="child-cont">

            <div class="header">
                <img src="images/logo.jpg" alt="">
                <div class="sec-2">
                <h2>Log In</h2>
                </div>
            </div>

            <div class="form-cont">
                <form class="form" method="POST" action="">

                    <div class="input">
                        <p>Username</p>
                        <input type="text" placeholder="username" name="user" title="Enter username">
                    </div>

                    <div class="input">
                        <p>Password</p>
                        <input type="password" placeholder="Password" name="pass" title="Enter password">
                    </div>

                    <div class="login-btn">
                        <input type="submit" name="submit" value=" Login In ">
                    </div>
                </form>
            </div>

            <div class="forget-pass">
                <a href="register.php">Do not have a account ? Register</a>
            </div>

            <div class="err">
                <center>
                    <?php
                    echo $mes
                    ?></center>
            </div>

        </div>
    </div>
</body>

</html>


<script type="text/javascript">

    

</script>

