<?php
include 'database.php';
include 'data.php';
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please Login First')</script>";
    echo "<script type='text/javascript'>
         document.location.href='index.php'; 
        </script>
    ";
}

if (!isset($_GET['id'])) 
{
    header('location:index.php');
}
?>

<?php

if (isset($_GET['id'])) {
    $query = "SELECT * FROM movie_details WHERE movie_id = '" . $_GET['id'] . "'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        $data = mysqli_fetch_array($result);

        $movie_data = array(
            "id" => $data['movie_id'],
            "name" => $data['name'],
            "des" => $data['des'],
            "price" => $data['price'],
            "duration" => $data['duration'],
            "link" => $data['image'],
            "date" => $data['date'],
            "ratting" => $data['ratting'],
            "category" => $data['category']
        );
    }
    $_SESSION['id'] = $data['movie_id'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['price'] = $data['price'];
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book ticket</title>
    <?php
    include 'links.php';
    ?>
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

    body 
    {
        position: relative;
    }
    .main-row {
        display: flex;
        padding: 50px 0px;
        justify-content:space-around;
        
        


    }

    .movie-img img {
        width: 400px;
        height: 550px;
        box-shadow: 0px 0px 10px grey,
            10px 10px 20px grey;
    }

    .book-movie {
        box-shadow: 0px 0px 10px grey;
        padding: 20px 30px;
    }

    .movie-card {
        background-color: rgba(33, 33, 32, 1);
        width: 600px;
        height: 550px;
        color: white;
        font-family: 'Montserrat', sans-serif;
    }

    .des {
        line-height: 25px;
    }

    .movie-card  *::selection {
        background: #1abc9c;
    }

    .des p::first-letter
    {
        color: yellow;
        font-size: 25px;
        padding: 0px 2px;
    }

    .alert-div
    {
        position: absolute;
        width: 100%;
        top: 90px;
    }
    .alert 
    {
        margin: auto;
    }

    .sec-1 
    {
        width: 900px;
        padding: 50px;
        

    }
    .sec-2 
    {
        width: 580px;
        padding: 50px;
    }
</style>

<body style="min-width:1200px">
    <?php
    include 'header.php';
    ?>
    <div class="alert-div">
        <?php 
            if(isset($_SESSION['error_msg']))
            {
                echo '<div class="alert alert-success alert-dismissible w-25">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-danger">* </strong> ' . $_SESSION['error_msg'] . '
            </div>';
            unset($_SESSION['error_msg']);
            }
        ?>
    </div>
    <div class="row main-row d-flex  flex-wrap ">
        <div class="sec-1  d-flex ml-3">
            <div class="">
                <div class="movie-img">
                    <img src="<?php echo $data['image'] ?>" alt="">
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-info pt-4 px-4 pb-3">
                    <h3 class="name">
                        <?php echo $data['name'] ?>
                    </h3>
                </div>

                <div class="row pl-3 pr-2">
                    <div class="w-25">
                        <h6>Year :
                            <span class="badge badge-info p-1">
                                <?php $d = strtotime($data['date']);
                                echo date("Y", $d); ?>
                            </span>
                        </h6>
                    </div>

                    <div class=" pr-2 " style="width:150px;">
                        <h6> Duration :
                            <span class="badge badge-info p-1 ">
                                <?php echo $data['duration'] ?>
                            </span>
                        </h6>
                    </div>

                    <div class="">
                        <h6 class="badge badge-warning p-1">
                            <?php echo $data['category'] ?>
                        </h6>
                    </div>
                </div>

                <div class="des-cont">
                    <div class=" des pt-3 px-4 ">
                        <p>
                            <?php echo $data['des'] ?>
                        </p>
                    </div>
                    <div class=" px-4 mt-n2">
                        <a href="" class="text-warning">
                            Read more
                        </a>
                    </div>
                </div>

                <div class="px-4 pt-3">
                    <h5 class="pt-2">
                        Price : <span>&nbsp; &#8377; <?php echo $data['price'] ?></span>
                    </h5>
                </div>
            </div>
        </div>

        <div class=" sec-2 ml-n5">
            <div class="book-movie">
                <div class="" style="text-align: center;">
                    <h4 class="font-weight-bold">Book <span class="text-danger">Ticket</span></h4>
                </div>
                <form action="book.php" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo $user_data['fname'] . ' ' . $user_data['lname']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user_data['email']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $user_data['phone']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for=""> Date And Time</label>
                        <br>
                        <div class="d-flex justify-content-between ">
                            <input type="date" class="form-control d-inline w-25" name="date" id="" min="<?php echo date("Y-m-d",strtotime("tomorrow")) ?>" required>
                            <select class="form-control d-inline" name="time" id="" style="width: 300px !important;" required>
                                <option value="10:00:00">Morning Show (10:00) </option>
                                <option value="13:00:00">Afternoon Show (01:00) </option>
                                <option value="18:00:00">Evening Show (06:00) </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">No. Of Tickets </label>
                        <br>
                        <div class="d-flex justify-content-between ">
                            <input type="number" class="form-control d-inline w-25" name="ticket" id="no" oninput="cal()" required>
                            <input type="text" name="price" class="form-control" value="" id="price" style="width: 300px !important;" placeholder="Price" disabled>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">
                            Confirm Booking
                        </button>
                    </div>
                    <div class="pb-1">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>

<script>
    function cal() {
        var no = document.getElementById("no").value;
        var price = <?php echo $data['price'] ?>;

        if (no > 0) {
            if (no <= 10) {
                document.getElementById("price").value = no * price;
            } else {
                document.getElementById("price").value = "Only 10 ticket allowed";
            }
        } else if (no == 0) {
            document.getElementById("price").value = 'Select No. of tickets';
        } else {
            document.getElementById("price").value = "Enter Valid number";
        }

    }
</script>