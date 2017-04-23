<?php
   function changeValue(&$y) {
       $y = $y + 5;
   }
   $myNumber = 8;
   changeValue($myNumber);
    var_dump($myNumber);
   echo $myNumber;
?>
