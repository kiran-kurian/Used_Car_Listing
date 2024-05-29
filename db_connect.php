<?php
$servername="localhost";
$username= "root";
$password= "";
$dbname= "used_car";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error)
{
    die("Error". $con->connect_error);
}
?>