<?php
$name = 'localhost';
$unmae = 'root';
$password = '';
$db_name = 'work-management-app';

$conn = mysqli_connect($name, $unmae, $password, $db_name);

if(!$conn) {
    echo "connection Failed";
}
?>