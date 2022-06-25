<?php
$mysqli = new mysqli('localhost','root','password','stock');
if($mysqli->connect_error) { die('Error'.('.$mysqli->connect_errno.')'.$mysqli->connect_error');}
else{
    echo "Connected to database";
}
?>