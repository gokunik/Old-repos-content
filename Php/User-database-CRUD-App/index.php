
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

        <div>
            <a href="login.php"><button type="button" class="btn btn-primary">Log out</button></a>
        </div>
    </div>

    <div class="sec-2">
        <center>
            <form action="logic.php" method="POST" class="form">
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
                            <input type="text" class="input" name="fname" placeholder="Enter first name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                last name
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" name="lname" placeholder="Enter last name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Email
                            </h4>
                        </td>
                        <td>
                            <input type="email" class="input" name="email" placeholder="Enter email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Mobile
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" name="mobile" placeholder="Enter mobile">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                Age
                            </h4>
                        </td>
                        <td>
                            <input type="number" class="input" name="age" placeholder="Enter age">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                City
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" name="city" placeholder="Enter city">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4 class="label">
                                state
                            </h4>
                        </td>
                        <td>
                            <input type="text" class="input" name="state" placeholder="Enter State">
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
                                <option value="seller">Seller</option>
                                <option value="buyer">buyer</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <center>
                    <input type="text" class="input mt-3" name="extra" placeholder="Find, update, Delete, using Mobile Number " style="width: 350px; text-align:center;">
                </center>
                <div class="container">
                    <center>
                        <div class="pY-3">
                            <button type="submit" class="btn btn-primary" name="insertt">
                                Insert
                            </button>
                            <button type="submit" class="btn btn-primary" name="update">
                                Update
                            </button>
                            <button type="submit" class="btn btn-primary" name="find">
                                Find
                            </button>
                            <button type="submit" class="btn btn-primary" name="delete">
                                Delete
                            </button>

                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary" name="first">
                                First Record
                            </button>
                            <button type="submit" class="btn btn-primary" name="prev">
                                Previous Record
                            </button>
                            <button type="submit" class="btn btn-primary" name="next">
                                Next Record
                            </button>
                            <button type="submit" class="btn btn-primary" name="last">
                                Last Record
                            </button>
                        </div>
                    </center>
                </div>

            </form>
        </center>


    </div>

</body>

</html>