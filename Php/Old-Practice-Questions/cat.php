<?php
session_start();


if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "ecom");
    $item = $_POST['item_price'];
    $price = $_POST['item_price'];

    
    $reg = "insert into cart_items(name,price) values('$item','$price')";
    mysqli_query($con, $reg);
    $mes = "item Added";

}


?>


<!DOCTYPE html>
<html>
<head>
<title>Cart Service</title>
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
Your Cart
</h2>
</center>
</div>

<section class="container mt-5 pt-5">
    <center>
        <div>
            <button type="button" class=" btn btn-primary" onclick="change()">
            View Items in the cart
            </button>
            <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#add">
            Add Items in the cart
            </button>
        </div>
    </center>
</section>

<! ----- first modal for checking cabs -->
<div class="modal" id="add">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View Cart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="$_POST">
            <table style="width: 400px;">
            <colgroup>
            <col style="width: 50%;">
            <col style="width: 50%;">
            </colgroup>

            <tr>
                <td>
                    item name
                </td>
                <td>
                    <input type="text" name="item_name">
                </td>
            </tr>

            <tr>
                <td>
                    item Price
                </td>
                <td>
                    <input type="text" name="item_rate">
                </td>
            </tr>

            <tr class="" >
                <td  colspan="2" >
                <button type="submit" name="add_submit">
                add
                </button>
                </td>
            </tr>

            </table>
        </form>
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

<?php



?>