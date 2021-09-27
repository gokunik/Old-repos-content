<?php
include 'database.php';

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Monster</title>
    <?php
    include 'links.php';
    ?>
</head>
<style>
    .carousel-inner img {
        width: 100%;
        height: 550px;
    }

    .carousel-inner {
        box-shadow: 0px 0px 5px grey;
        border-radius: 5px;
    }
</style >

<body style="min-width:1200px">
    <?php
    include 'header.php';
    ?>

    <div class="pt-3 px-3">
        <div id="movie-corousel" class="carousel slide" data-ride="carousel">


            <ul class="carousel-indicators">
                <li data-target="#movie-corousel" data-slide-to="0" class="active"></li>
                <li data-target="#movie-corousel" data-slide-to="1"></li>
                <li data-target="#movie-corousel" data-slide-to="2"></li>
            </ul>


            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <img src="images/img2.jpg " alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="images/img5.jpg" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="images/img6.jpg" alt="New York">
                </div>
            </div>

            <a class="carousel-control-prev" href="#movie-corousel" data-slide="prev">
                <span class="carousel-control-prev-icon text-warning"></span>
            </a>
            <a class="carousel-control-next" href="#movie-corousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>

    <div class="container mt-5 d-flex justify-content-center flex-wrap">
        <h1 class="">
            Now <span class="text-warning">Streaming</span>
        </h1>
    </div>

    <div class="wrapper d-flex justify-content-around flex-wrap">
        <div class="main_card">
            <div class="card_left">
                <div class="card_datails">
                    <h1>Mission: Impossible – Fallout</h1>
                    <div class="card_cat">
                        <p class="PG">PG - 13</p>
                        <p class="year">2018</p>
                        <p class="genre">Action | Adventure </p>
                        <p class="time">2h 28m</p>
                    </div>
                    <p class="disc">Ethan Hunt and his IMF team, along with some familiar allies, race against time after a mission gone wrong.</p>
                    <a class="more" href="https://www.imdb.com/title/tt4912910/" target="_blank">Read More</a>
                    <div class="social-btnn">

                        <a href="https://www.youtube.com/watch?v=wb49-oV0F78" target="_blank">
                            <button>
                                <i class="fas fa-play"></i> SEE TRAILER
                            </button>
                        </a>

                        <a href="booking.php?id=a1">
                            <button>
                                <i class="fa fa-check" aria-hidden="true"></i> Book
                            </button>
                        </a>

                        <button>
                            <i class="fas fa-thumbs-up"></i> 97%
                        </button>

                        <button>
                            <i class="fas fa-star"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card_right">
                <div class="img_container">
                    <a href="https://www.imdb.com/title/tt4912910/" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/en/f/ff/MI_%E2%80%93_Fallout.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="main_card">
            <div class="card_left">
                <div class="card_datails">
                    <h1>Avengers End Game</h1>
                    <div class="card_cat">
                        <p class="PG">PG - 13</p>
                        <p class="year">2019</p>
                        <p class="genre">Action | Adventure </p>
                        <p class="time">3h 1m</p>
                    </div>
                    <p class="disc">After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. </p>
                    <a class="more" href="https://www.imdb.com/title/tt4154796/" target="_blank">Read More</a>
                    <div class="social-btnn">

                        <a href="https://www.youtube.com/watch?v=TcMBFSGVi1c" target="_blank">
                            <button>
                                <i class="fas fa-play"></i> SEE TRAILER
                            </button>
                        </a>

                        <a href="booking.php?id=a2">
                            <button>
                                <i class="fa fa-check" aria-hidden="true"></i> Book
                            </button>
                        </a>

                        <button>
                            <i class="fas fa-thumbs-up"></i> 99%
                        </button>

                        <button>
                            <i class="fas fa-star"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card_right">
                <div class="img_container">
                    <a href="https://www.imdb.com/title/tt4154796/" target="_blank">
                        <img src="https://i.pinimg.com/736x/f7/9c/13/f79c1388b37bfbca38043653d313234d.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="pt-5">
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
<?php

if (isset($_SESSION['flag'])) {
    echo '<script>alert("Successfully Logged In")</script>';
    unset($_SESSION['flag']);
}
?>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php
if(isset($_SESSION['login_flag']))
{
    if ($_SESSION['login_flag']) {
        echo "<script>$(document).ready(function() { $('#login-modal').modal('show'); });</script>";
        $_SESSION['login_flag'] = 0;
    }
}

if(isset($_SESSION['register_flag']))
{
    if($_SESSION['register_flag'])
{
    echo "<script>$(document).ready(function() { $('#register-modal').modal('show'); });</script>";
    $_SESSION['register_flag'] = 0;
}
}
?>