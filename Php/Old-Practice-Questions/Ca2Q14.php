<?php
class Student
{public $name;
public $rollno;
function __construct()
{
$this->name="Nitesh";
$this->rollno=19;
}
public function asked()
{
	echo "what is ur name and rollno";
}

public function StudentReplied()
{
	echo "<br>My name is ".$this->name." roll no is ".$this->rollno;
}
function __destruct()
{
	echo "<br>ok go now";
}
}
$Teacher=new Student();
$Teacher->asked();
$Teacher->StudentReplied();
?>