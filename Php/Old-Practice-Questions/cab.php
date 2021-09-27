<?php
$flag = 0;
$data = array();
$i = 0;
$con = mysqli_connect("localhost", "root", "", "cab");
if ($con === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}


if (isset($_POST['check_submit'])) {
  $id = $_POST['driver_id'];
  $name = $_POST['driver_name'];
  $city = $_POST['city'];
  $query = "SELECT * FROM cab_detail WHERE id = '" . $id . "' AND city = '" . $city . "' ";
  $run = mysqli_query($con, $query);

  if (mysqli_num_rows($run) > 0) {
    
    while ($row = mysqli_fetch_assoc($run)) {

      $data[$i] = array(
        "id" => $row['id'],
        "name" => $row['name'],
        "no" => $row['no'],
        "city" => $row['city']
      );

      $i = $i + 1;
    }

    $flag = 1;
   
    
  } else {
    echo "ERROR: Could not able to execute $run " . mysqli_error($con);
  }
}

if (isset($_POST['check_city'])) {
  
  $city = $_POST['city'];
  $query = "SELECT * FROM cab_detail WHERE city = '" . $city . "' ";
  $run = mysqli_query($con, $query);

  if (mysqli_num_rows($run) > 0) {
    
    while ($row = mysqli_fetch_assoc($run)) {

      $data[$i] = array(
        "id" => $row['id'],
        "name" => $row['name'],
        "no" => $row['no'],
        "city" => $row['city']
      );

      $i = $i + 1;
    }

    $flag = 1;
   
    
  } else {
    echo "ERROR: Could not able to execute ";
  }
}


if (isset($_POST['add_submit'])) {
  $id = $_POST['driver_id'];
  $name = $_POST['driver_name'];
  $city = $_POST['city'];

  $check = "SELECT * FROM cab_detail WHERE id  = '" . $id . "' AND city = '" . $city . "'";
  $ch = mysqli_query($con, $check);

  if(!mysqli_num_rows($ch))
  {
      $query = "INSERT INTO cab_detail(id,name,no,city) VALUES('$id','$name',1,'$city') ";
      $re = mysqli_query($con, $query);
      echo "<script>alert('Successfully Inserted.');</script>";
      
  }
  else{

  $update = " UPDATE cab_detail SET no = no+1 WHERE  ";

  if (mysqli_query($con, $update)) {

    echo "<script>alert('Successfully Inserted.');</script>";
  } else {
    echo "ERROR: Could not able to execute $query " . mysqli_error($con);
  }
}
}

if(isset($_POST['remove_submit']))
{
  $id = $_POST['driver_id'];
  $city = $_POST['city'];
  $query = "DELETE FROM cab_detail WHERE id  = '" . $id . "' AND city = '" . $city . "' " ;
  try {
      if (mysqli_query($con, $query)) {
          if (mysqli_affected_rows($con) > 0) {
              echo "<script>alert('Successfully Deleted.');</script>";
              
          } else {
              echo "<script>alert('deletion Failed.');</script>";
              
          }
      }
  } catch (Exception $error) {
      echo 'Error Delete ' . $ex->getMessage();
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Cab Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="container mt-3 ">
    <center>
      <h2 class="text-success">
        Cab Service Portal
      </h2>
    </center>
  </div>


  <section class="container mt-5 pt-5">
    <center>
      <div>
        <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#check">
          Check cab booking
        </button>
        <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#add">
          Add cab booking
        </button>
        <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#remove">
          Remove cab booking
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
          <th>Name</th>
          <th>Bookings</th>
          <th>City</th>
        </tr>
        </thead>

        <tbody>
          <?php
            if($flag == 1)
            {
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
            }
          ?>
        </tbody>

      
      </table>
    </center>
  </section>

  <! ----- first modal for checking cabs -->
    <div class="modal" id="check">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Check for cabs</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <center>
              <form action="" method="POST">
                <table style="width: 400px;">
                  <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                  </colgroup>

                  <tr>
                    <td>
                      Driver id
                    </td>
                    <td>
                      <input type="number" name="driver_id" id="req">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      Driver Name
                    </td>
                    <td>
                      <input type="text" name="driver_name">
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
                    <td class="pt-4">
                      <button type="submit" class="btn btn-primary" name="check_submit" >
                        Check Driver
                      </button>
                      <td class="pt-4">
                      <button type="submit" class="btn btn-primary" name="check_city">
                        Search city
                      </button>
                    </td>
                    </td>
                  </tr>

                </table>
              </form>
            </center>

            <div class="container mt-3">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">Note*</strong> If you just want to search all the driver in a particular city
                then click the search city button and only select the city
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



    <! ----- second modal for adding cabs -->
      <div class="modal" id="add">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Cab Booking</h4>
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
                        Driver id
                      </td>
                      <td>
                        <input type="number" name="driver_id" required>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        Driver Name
                      </td>
                      <td>
                        <input type="text" name="driver_name">
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
                          Add Booking
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

      <! ----- Third modal for removing cabs -->

        <div class="modal" id="remove">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Remove Cab booking</h4>
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
                        Driver id
                      </td>
                      <td>
                        <input type="number" name="driver_id" required>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        Driver Name
                      </td>
                      <td>
                        <input type="text" name="driver_name">
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
                        <button type="submit" class="btn btn-primary" name="remove_submit">
                          Remove Booking
                        </button>
                      </td>
                    </tr>

                  </table>
                </form>
              </center>
              <div class="container mt-3">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">Note*</strong> All the cab booked under the particular city will be deleted
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

<script>


  
</script>