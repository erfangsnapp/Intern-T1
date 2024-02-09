<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<?php
if($is_admin == true){
    echo "<body style='background-color:red;'>"; 
}
else{
    echo "<body style='background-color:blue'>"; 
}
?>
</body>
</html>