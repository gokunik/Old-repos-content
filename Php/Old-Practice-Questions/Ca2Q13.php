<?php

$arr = array('Nitesh','Deepak','Raman','Mannu','Ajit');
$arr1 = array('person1'=>'Nitesh','person2'=>'Deepak','person3'=>'Raman','person4'=>'Mannu','person5'=>'Ajit');

echo '<h3>Use of Array Navigation Functions</h3>';

echo '<h4>Current values in the array ( using for loop )</h4>  ';
for($i = 0 ; $i<5 ; $i++)
{
    echo '['.$i.'] = '.$arr[$i].'<br>';
}

echo '<br> By default Array pointer point to first element at [0] index  <br>';

echo '<br>-----------------------------------------------------<br><br>';
echo '1) Current Position value -> '. current($arr) . 
     '<br>Returned the current value using current() <br>';

echo '<br>2) Next Position value -> ' .next($arr). 
     '<br> Array pointer moved to next position using next() <br>';

echo '<br>3) End Position value -> ' .end($arr). 
     '<br> Array pointer moved to the last position using end() <br>';

echo '<br>4) Previous Position value -> ' .prev($arr). 
     '<br> Array pointer moved to the previous position using prev() <br>';

echo '<br>5) Reseting the array pointer -> ' .reset($arr). 
     '<br> Array pointer moved to the first position using reset() <br>';

echo '<br>6) Key of current element -> ' .key($arr). 
     '<br> key of the current element returned using key() <br>';

echo '<br>-----------------------------------------------------<br>';
 

echo '<br> Printing values using foreach loop <br>';  
foreach($arr1 as $x => $val) {
    echo " $x => $val<br>";
  }
?>



