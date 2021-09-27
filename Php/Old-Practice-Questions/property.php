<?php
$flag = 0;
$data = array();
$i = 0;
$con = mysqli_connect("localhost", "root", "", "mydb");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

# for creating table -------

/*
$sql = "CREATE TABLE property (
    indexx INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id INT(30) NOT NULL,
    width INT(30) NOT NULL,
    len int(50) NOT NULL,
    city VARCHAR(30) NOT NULL
    )";
    
    if ($con->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $con->error;
    }

    */
#------------------------


if (isset($_POST['add_submit'])) {
    $id = $_POST['id'];
    $width = $_POST['width'];
    $lenn = $_POST['len'];
    $city = $_POST['city'];

    $ch = "SELECT id FROM property where id = '" . $id . "' ";
    $re = mysqli_query($con,$ch);

    if(mysqli_num_rows($re) > 0)
    {
        echo "<script>alert('Property Id already present in the database');</script>";
    }
    else
    {
      $query = "INSERT INTO property(id,width,len,city) VALUES('$id','$width','$lenn','$city') ";
      $result = mysqli_query($con, $query);
      if($result)
      {
        echo "<script>alert('Successfully Inserted.');</script>";
      }
      else{
        echo "ERROR: Could not able to execute $result " . mysqli_error($con);
      }
    }

}


if (isset($_POST['remove_submit'])) {
    $id = $_POST['id'];
    
    $query = "DELETE FROM property WHERE id  = '" . $id . "' ";

        if (mysqli_query($con, $query)) {
            if (mysqli_affected_rows($con) > 0) {
                echo "<script>alert('Successfully Deleted.');</script>";
            } else {
                echo "<script>alert('deletion Failed.');</script>";
            }
        }
    }

$query = "SELECT * FROM property ";
  $run = mysqli_query($con, $query);

  if (mysqli_num_rows($run) > 0) {
    
    while ($row = mysqli_fetch_assoc($run)) {

      $data[$i] = array(
        "id" => $row['id'],
        "width" => $row['width'],
        "len" => $row['len'],
        "city" => $row['city']
      );

      $i = $i + 1;
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Services</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container mt-3 ">
        <center>
            <h2 class="text-success">
                Property Service Portal
            </h2>
        </center>
    </div>

    <section class="container mt-5 pt-5">
        <center>
            <div>
                <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#add">
                    Add Property
                </button>
                <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#remove">
                    Remove property
                </button>
            </div>
        </center>
    </section>

    <section class="container mt-5 ">
    <center>
      <table border="1px" style="width: 450px;">
        <colgroup>
        <col style="width: 25%; padding:10px;">
        <col style="width: 25%;">
        <col style="width: 25%;">
        <col style="width: 25%;">

        </colgroup>
        
        <thead>
        <tr>
          <th>Id</th>
          <th>width</th>
          <th>length</th>
          <th>City</th>
        </tr>
        </thead>

        <tbody>
          <?php
            
              foreach($data as $key => $value)
              {
                echo "<tr>";
                foreach($value as $subkey => $subvalue)
                {
                  echo "
                  
                    <td>
                    ".$subvalue."
                    </td>
                   
                ";
                }
                echo "</tr>";
              }
            
          ?>
        </tbody>

      
      </table>
    </center>
  </section>

    <div class="modal" id="add">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Property</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                        <form method="POST">
                            <table style="width: 400px;">
                                <colgroup>
                                    <col style="width: 50%;">
                                    <col style="width: 50%;">
                                </colgroup>

                                <tr>
                                    <td>
                                        property id
                                    </td>
                                    <td>
                                        <input type="number" name="id" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Property Width <sup class="text-danger"  >*meter</sup>
                                    </td>
                                    <td>
                                        <input type="number" name="width" id="w">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        property Length <sup class="text-danger"   >*meter</sup>
                                    </td>
                                    <td>
                                        <input type="number" name="len" id="l" >
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        City
                                    </td>
                                    <td>
                                        <select name="city" id="">
                                            <option value="delhi">Delhi</option>
                                            <option value="mumbai">Mumbai</option>
                                            <option value="haryana">Haryana</option>
                                            <option value="punjab">Punjab</option>
                                            <option value="uttar pradesh">Uttar Pradesh</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="">
                                    <td colspan="2" class="pt-4">
                                        <button type="submit" class="btn btn-primary" name="add_submit">
                                            Add property
                                        </button>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </center>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal" id="remove">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Remove property</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                        <form method="POST">
                            <table style="width: 400px;">
                                <colgroup>
                                    <col style="width: 50%;">
                                    <col style="width: 50%;">
                                </colgroup>

                                <tr>
                                    <td>
                                        property id
                                    </td>
                                    <td>
                                        <input type="number" name="id" required>
                                    </td>
                                </tr>

                                <tr class="">
                                    <td colspan="2" class="pt-4">
                                        <button type="submit" class="btn btn-primary" name="remove_submit">
                                            Remove property
                                        </button>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </center>
                    <div class="container mt-3">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong class="text-danger">Note*</strong> Selected property will be deleted Forever
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
