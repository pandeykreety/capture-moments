<?php
$servername = 'localhost';
$username = 'root';
$password='';
$dbname= 'capture';
$conn =new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
 
    die(mysqli_error($conn));
}
else{
    
}
?>


