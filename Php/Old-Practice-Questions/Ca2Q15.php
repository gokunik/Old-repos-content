<?php

// admin class include all the student information
class admin
{
    final function student_details()
    {
        $name = "Nitesh Khatri";
        $reg_no = 11813971;
        $section = "D1801";
        echo "Student Details <br>";
        echo "Name  -> ".$name;
        echo "<br> Reg No -> ".$reg_no;
        echo "<br>Section -> ".$section."<br><br>";
    }

    function marks()
    {
        echo " Student Marks ";   
    }

    function attendance()
    {
        echo "Student Attendance <br>";
    }
}

class teacher extends admin 
{

    /*
    following code will generate error
    function student_details() { }
    */

    function marks() 
    {
        echo "Allocating subject marks to student";
    }

    function attendance()
    {
        echo "Marking student attendance";
    }
    
}

?>


