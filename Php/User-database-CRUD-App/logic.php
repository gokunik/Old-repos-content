<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "ecom");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
function getpage($fetch)
{
    echo ' 
                            
<html>
<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
* {
    margin: 0px;
    padding: 0px;
 
}

body {
    width: 100vw;
    height: 100%;
    display: flex;
    flex-direction: column;

}

.sec-1 {
    width: 100%;
    height: 15%;
    box-shadow: 0px 0px 10px grey;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.sec-1 img {
    block-size: 100px;

}


.sec-2 {
    height: 85%;
    width: 100%;
    padding: 10px;
    margin: 10px 0px;

}

/* from styling */

table {
    box-shadow: 0px 0px 3px grey;
    border-radius: 10px;
    width: 350px;
}

table td {
    padding: 10px;
    padding-left: 20px;
}



.input {
    width: 170px;
    height: 30px;
    outline: none;
    border: none;
    box-shadow: 0px 0px 3px grey;
    border-radius: 3px;
    padding-left: 10px;

}

.btn {
    padding: 10px 25px;
}
</style>

<body>
    <div class="sec-1">

        <div class="image">
            <img src="images/logo" alt="">
        </div>


        <div class="heading">
            <h4>
                User Database
            </h4>
        </div>
    </div>

    <div class="sec-2">
        <center>
            <form class="form">
                <table>
                    <colgroup>
                        <col style="width: 50%;">
                        <col style="width: 50%;">
                    </colgroup>
                    <tr>
                        <td>
                            <h4 class="label">
                                first name
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" value = ' . $fetch["fname"] . ' name="fname" placeholder="Enter first name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                last name
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" value = ' . $fetch["lname"] . ' name="lname" placeholder="Enter last name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Email
                            </h4>
                        </td>
                        <td>
                            <input type="email" class="input"value = ' . $fetch["email"] . ' name="email" placeholder="Enter email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Mobile
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input"value = ' . $fetch["mobile"] . ' name="mobile" placeholder="Enter mobile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Age
                            </h4>
                        </td>
                        <td>
                            <input type="number" class="input" value = ' . $fetch["age"] . ' name="age" placeholder="Enter age">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                City
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" value = ' . $fetch["city"] . ' name="city" placeholder="Enter city">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                state
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" value = ' . $fetch["state"] . ' name="state" placeholder="Enter State">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                User Roll
                            </h4>
                        </td>
                        <td>
                            <select name="roll" class="input">
                                <option >' . $fetch["role"] . '</option>
                                
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <h3 class="mt-4"> <a href="index.php">Go Back to homepage </a> </h3>
        </center>


    </div>

</body>

</html>
                
';

}

function getdata()
{
    $data = array();
    $data[0] = $_POST['fname'];
    $data[1] = $_POST['lname'];
    $data[2] = $_POST['email'];
    $data[3] = $_POST['mobile'];
    $data[4] = $_POST['age'];
    $data[5] = $_POST['city'];
    $data[6] = $_POST['state'];
    $data[7] = $_POST['roll'];
    $data[8] = $_POST['extra'];
    
    return $data;
}
if (isset($_POST['insertt'])) {
    $d = getdata();
    $s = " Insert into user_details (fname, lname, email, mobile, age, city, state,role) values( '$d[0]','$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]') ";

    if (mysqli_query($con, $s)) {
        echo "<script>alert('Successfully Inserted.');</script>";
        echo " Redirecting back to homepage ";
        echo "<script type='text/javascript'>

    setTimeout(function () {document.location.href='index.php';},1000);
    
    </script>
    ";
    } else {
        echo "ERROR: Could not able to execute $s " . mysqli_error($con);
        echo "<br><br><a href='index.php'> Go back to homepage </a>";
    }
}

if (isset($_POST['update'])) {
    $d = getdata();
    $re = mysqli_query($con, "select mobile from user_details where mobile = '" . $d[8] . "'");

    if (!mysqli_num_rows($re)) {
        echo "<script>alert('Update Failed.');</script>";
        echo " Redirecting back to homepage in 1 seconds ";
        echo "<script type='text/javascript'>
    setTimeout(function () {document.location.href='index.php';},1000);
    </script>
    ";
    } else {
        $update = "update user_details set 
        fname = '$d[0]',lname = '$d[1]',email = '$d[2]', mobile = '$d[3]', age = '$d[4]', city = '$d[5]', state = '$d[6]', role = '$d[7]' where mobile = '$d[8]' ";

        if (mysqli_query($con, $update)) {
            echo "<script>alert('Successfully Updated.');</script>";
            echo " Redirecting back to homepage in 1 seconds ";
            echo "<script type='text/javascript'>
    setTimeout(function () {document.location.href='index.php';},1000);
    </script>
    ";
        } else {
            echo "ERROR: Could not able to execute $update " . mysqli_error($con);
            echo "<br><br><a href='index.php'> Go back to homepage </a>";
        }
    }
}


if (isset($_POST['find'])) {

    $d = getdata();
    $search = "select * from  user_details where mobile = '" . $d[8] . "' ";
    $re = mysqli_query($con, $search);
    if (mysqli_num_rows($re)) {
        while ($fetch = mysqli_fetch_array($re)) {
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['cur'] = $fetch['id'];
            getpage($fetch);
        }
    } else {
        echo "Record not found with given mobile number";
        echo "<br><br><a href='index.php'> Go back to homepage </a>";
    }
}

if (isset($_POST['delete'])) {
    $d = getdata();
    $_SESSION['id'] = mysqli_query($con, "select id from user_details where mobile = '" . $d[8] . "'");
    $query = "delete from user_details where mobile = '" . $d[8] . "'";
    try {
        if (mysqli_query($con, $query)) {
            if (mysqli_affected_rows($con) > 0) {
                echo "<script>alert('Successfully Deleted.');</script>";
                echo " Redirecting back to homepage in 1 seconds ";
                echo "<script type='text/javascript'>
                setTimeout(function () {document.location.href='index.php';},1000);
                </script>
                ";
            } else {
                echo "<script>alert('deletion Failed.');</script>";
                echo " Redirecting back to homepage in 1 seconds ";
                echo "<script type='text/javascript'>
                setTimeout(function () {document.location.href='index.php';},1000);
                </script>
                ";
            }
        }
    } catch (Exception $error) {
        echo 'Error Delete ' . $ex->getMessage();
    }
}

if (isset($_POST['first'])) {
    $d = getdata();
    $query = "select * from user_details limit 1";
    $re =  mysqli_query($con, $query);
    if (!empty($query)) {
        if (mysqli_num_rows($re)) {
            while ($fetch = mysqli_fetch_array($re)) {
                getpage($fetch);
            }
        } else {
            echo "<script>alert('Operation Failed.');</script>";
            echo " Redirecting back to homepage in 1 seconds ";
            echo "<script type='text/javascript'>
            setTimeout(function () {document.location.href='index.php';},1000);
            </script>
            ";
        }
    }
}

if (isset($_POST['last'])) {
    $d = getdata();
    $query = "select * from user_details order by id desc limit 1";
    $re =  mysqli_query($con, $query);
    if (!empty($query)) {
        if (mysqli_num_rows($re)) {
            while ($fetch = mysqli_fetch_array($re)) {
                getpage($fetch);
            }
        } else {
            echo "<script>alert('Operation Failed.');</script>";
            echo " Redirecting back to homepage in 1 seconds ";
            echo "<script type='text/javascript'>
            setTimeout(function () {document.location.href='index.php';},1000);
            </script>
            ";
        }
    }
}

if (isset($_POST['prev'])) {
    $d = getdata();
    $query = "select * from user_details where id < '".$_SESSION['id']."' order by id desc limit 1";
    $re =  mysqli_query($con, $query);
    if (!empty($query)) {
        if (mysqli_num_rows($re)) {
            while ($fetch = mysqli_fetch_array($re)) {
                getpage($fetch);
            }
        } else {
            echo "<script>alert('No previous Record Available');</script>";
            echo " Redirecting back to homepage in 1 seconds ";
            echo "<script type='text/javascript'>
            setTimeout(function () {document.location.href='index.php';},1000);
            </script>
            ";
        }
    }
}

if (isset($_POST['next'])) {
    $d = getdata();
    $query = "select * from user_details where id > '".$_SESSION['id']."' order by id asc limit 1";
    $re =  mysqli_query($con, $query);
    if (!empty($query)) {
        if (mysqli_num_rows($re)) {
            while ($fetch = mysqli_fetch_array($re)) {
                getpage($fetch);
            }
        } else {
            echo "<script>alert('No Next operation Available.');</script>";
            
        }
    }
}


mysqli_close($con);

?>