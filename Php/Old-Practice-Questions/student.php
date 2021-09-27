<?php
$data = array();
$i = 0;
$con = mysqli_connect("localhost", "root", "", "practice");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $query = "SELECT * FROM teacher ";
    $run = mysqli_query($con, $query);

    if (mysqli_num_rows($run) > 0) {
        while ($row = mysqli_fetch_assoc($run)) {
            $data[$i] = array(
                "subject" => $row['subject'],
                "question" => $row['question'],
                "date" => $row['date']
            );

            $i = $i + 1;
        }
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <center>
        <h2 class="text-success mt-4">
            Assignment Portal
        </h2>
    </center>

    <section class="container mt-5 ">
        <center>

            <center>
                <form method="POST">
                <button type="submit" name="submit" class="btn btn-success">
                    Check Assignment
                </button>
                </form>
            </center>

            <table border="1px" style="width: 450px;" class="mt-5">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 25%;">
                    <col style="width: 25%;">

                </colgroup>

                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Question</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($data as $key => $value) {
                        echo "<tr>";
                        foreach ($value as $subkey => $subvalue) {
                            echo "
                  
                    <td>
                    " . $subvalue . "
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
</body>

</html>