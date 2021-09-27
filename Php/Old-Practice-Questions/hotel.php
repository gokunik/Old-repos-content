<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Service</title>
</head>

<body>
    <center>
        <h1>
            Search details
        </h1>
    </center>

    <center>
        <form method="POST">
            <table border="1px">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>

                <tr>
                    <td>
                        Starting date
                    </td>
                    <td>
                        <input type="date" name="date1" value="">
                    </td>
                </tr>

                <tr>
                    <td>
                        Ending date
                    </td>
                    <td>
                        <input type="date" name="date2" value="">
                    </td>
                </tr>

            </table>

            <button type="submit" name="submit" style="margin: 10px 0px;"> Search</button>

        </form>
    </center>

</body>

</html>

<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "mydb");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $query = "SELECT * FROM HOTEL WHERE date >  '" . $date1 . "' AND date < '" . $date2 . "'  ";
    $result =  mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            echo
            "
            <center>
            <table border='1px'>
            <tr>
                <td>
                Costumer Id
                </td>
                <td>
                ".$row['id']."
                </td>
            </tr>

            <tr>
                <td>
                Costumer Name
                </td>
                <td>
                ".$row['name']."
                </td>
            </tr>
            <tr>
                <td>
                Costumer Mobile
                </td>
                <td>
                ".$row['number']."
                </td>
            </tr>

            <tr>
                <td>
                Date
                </td>
                <td>
                ".$row['date']."
                </td>
            </tr>
            </table>
            </center>
            <br>
            "
            ;
        }
        
      } else {
        echo "0 results";
      }
}
?>