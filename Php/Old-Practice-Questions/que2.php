<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

<center><h3>Sum Of matrices</h3></center>
        <table border="2" align="center">
            <tr><td colspan="3"><h1>Array 1</h1></td></tr>
<?php
            
    for ($i=0;$i<3;$i++) { /* Use of two loops to treverse two dimensional array */
        for ($j=0;$j<3;$j++) {
            $arr1[$i][$j] = rand(13, 20); /* Adding Random Values to array 1 and 2 */
            $arr2[$i][$j] = rand(50, 70);
        }
    }

    /* Printing two dimensional array 1 */
    echo "<tr>";
    for ($i=0;$i<3;$i++) { /* Use of two loops to treverse two dimensional array */
        for ($j=0;$j<3;$j++) {
            echo "<td>".$arr1[$i][$j]."</td>";
        }

        echo "</tr>";
    }

    /* Printing two dimensional array 2 */
    echo "<tr><td colspan='3'><h1>Array 2</h1></td></tr>";
    echo "<tr>";
    for ($i=0;$i<3;$i++) { /* Use of two loops to treverse two dimensional array */
        for ($j=0;$j<3;$j++) {
            echo "<td>".$arr2[$i][$j]."</td>";
        }

        echo "</tr>";
    }

    /* Printing Sum of matrices */
    echo "<tr><td colspan='3'><h1>the sum is:</h1></td></tr>";
    for ($i=0;$i<3;$i++) {
        echo "<tr>";
        for ($j=0;$j<3;$j++) {
            $a[$i][$j] = $arr1[$i][$j] + $arr2[$i][$j]; /* Adding the values of array and 2 and
                                                           storing it in another array */
            echo "<td>".$a[$i][$j]."</td>"; /* printing the array with new values */
        }
        echo "</tr>";
    }
?>
        </table>
    </body>
    </html> 