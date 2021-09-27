<?php
$con = mysqli_connect("localhost", "root", "","myDB");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
$table = "CREATE TABLE LPU_CANTEEN (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    block_number VARCHAR(30) NOT NULL,
    canteen_name VARCHAR(30) NOT NULL,
    open_date VARCHAR(50),
    headof_canteen VARCHAR(50),
    revenue VARCHAR(50)
    )";
    
    if ($con->query($table) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $con->error;
    }

function getdata()
{
    $data = array();
    $data[0] = $_POST['b_no'];
    $data[1] = $_POST['c_name'];
    $data[2] = $_POST['open_date'];
    $data[3] = $_POST['hoc'];
    $data[4] = $_POST['rev'];


    
    
}

if(isset($_POST['submit']))
{

    $data = getdata();

}

?>


<html>
<head>
<title>
Practice
</title>
</head>
<body>

<form action="" method="POST">

<center>
<table>
<colgroup>
    <col style="width: 50%;">
    <col style="width: 50%;">
  </colgroup>
<tr>
    <td>
        Block Number
    </td>
    <td>
        <input type="text" name="b_no">
    </td>
</tr>

<tr>
    <td>
        Canteen Number
    </td>
    <td>
        <input type="text" name="c_name">
    </td>
</tr>

<tr>
    <td>
        Opening Date
    </td>
    <td>
        <input type="date" name="open_date">
    </td>
</tr>
    
<tr>
    <td>
        Head of canteen
    </td>
    <td>
        <input type="date" name="hoc">
    </td>
</tr>

<tr>
    <td>
        Revenue
    </td>
    <td>
        <input type="text" name="rev">
    </td>
</tr>

<tr>
<td colspan="2">
<center>
    <button type="submit" name="submit" >Submit</button>
</center>
</td>
</tr>

</table>
</center>

</form>
    
</body>
</html>