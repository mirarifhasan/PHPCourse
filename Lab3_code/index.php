<?php
    $txt = "Hello world!";
    $x = 5;
    $y = 10.5; 
    echo $txt;
    echo $x+$y;

    echo $txt + $y;
    echo $txt . $y;
    
    
    
    echo"<pre>";
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
     ksort($age);
    print_r($age);
?>