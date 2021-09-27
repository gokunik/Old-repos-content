
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>

  
</head>
<style>
   

    table{
        width: 500px;
        text-align: center;
    }
    
</style>

<body>

        <center>
            <h2>
                Assignment
            </h2>
        </center>

    <div class="container mt-5">
        <center>
            <form method="POST" class="form p-2">
                
                            <h4>
                                select Subject
                            </h4>
                        
                            <select name="subject" id="">
                                <option value="select">select</option>
                                <option value="math">Math</option>
                                <option value="science">Science</option>
                                <option value="english">english</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        
                    
                            <h4>
                                submission date
                            </h4>
                        
                            <input type="date" name="date">
                       
                            <h4>
                            Write Question
                            </h4>
                      
                            <textarea name="question" id="" >

                            </textarea>
            

                <center class="mt-3 ">
                    <button type="submit" class="btn btn-primary mb-3" name="submit">
                        Punch
                    </button>
                </center>

            </form>
        </center>
    </div>

</body>

</html>

<?php
$con = mysqli_connect("localhost", "root", "", "myDb");
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $sub = $_POST['subject'];
    $d = $_POST['date'];
    $q = $_POST['question'];

    $q ="INSERT INTO teacher(subject,date,question) VALUES('$sub','$d','$q')";
    $ch = mysqli_query($con,$q);

    if($ch)
      {
        echo "Successfully Inserted.')";
      }
      else{
        echo "ERROR: Could not able to execute " ;
      }
    
}

?>