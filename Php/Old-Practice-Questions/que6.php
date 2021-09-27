<?php
if (isset($_POST['add'])) {
    $x = strval($_POST['num1']); // enter userid
    $y = strval($_POST['num2']); //enter password
    function check_uid($x) //function definition for checking user id
    {
        if (empty($x)) { //if user id is empty it will show please enter user id
            echo("<center>please enter user id</center>");
        } elseif (strlen($x) > 6) /*if length of password greater then 6 it will show user id sholud be minimum
                                    of 6 charcters*/ {
            echo "<center>user id sholud be minimum of 6 charcters</center>";
        }
    }
    function check_password($x, $y) //function definition for checking password
    {
        if (empty($y)) { //if passwod is empty it will show please enter password
            echo("<center>please enter password</center>");
        } 
        elseif ($y[0] == is_numeric($y[0]))
         /* if first character of password is digit it will show first
         character of password should be string not numeric*/ {
            echo "<center><br>first character of password should be string not
                   numeric</center>";
        } 
        elseif (substr($y, 0, 1) === '_') 
        /* if first character of password is _ it will show first character
         of password should be string not _*/ {
            echo "<center><br>the pasword should not start with _</center>";
        } 
        elseif (substr($y, 0, 1) === ' ') /* if first character of password whitespace it will show first
        character of password should be string not whitespace*/ {
            echo "<center><br>the pasword should not start with whitespace</center>";
        } 
        elseif ($y[0] >= 'a' and $y[0] <= 'z') /*if first character of password is in lowercase first it will
        convert it in uppercase and check the validity if all cases are true then it will print SUCCESS*/ {
            echo "<center>First letter is lower case so it was converted to upper case </center>";
            $y[0] = strtoupper($y[0]);
            if (strlen($x) <= 6 and !empty($y) and !empty($x)) {
                echo "<center>SUCCESS</center>";
            }
        } 
        else {
            if (strlen($x) <= 6 and !empty($y) and !empty($x)) {
                echo "<center>SUCCESS</center>";
            }
        }
    }
    check_uid($x); //function call to check user id
    check_password($x, $y); // function call to check password
} ?>