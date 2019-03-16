<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>
<?php

$file_handle = fopen($contact_data, 'r'); 
while (!feof($file_handle) ) 
{ 
    $line_of_text[] = fgetcsv($file_handle, 1024); 
} 
fclose($file_handle); 
return $line_of_text;

?>


</p>
</body>
</html>



