<?php
include "../db_connect.php";
$id= $_GET["id"];
$sql= "DELETE FROM cars WHERE id= $id";
$result=$con->query($sql);
if($result)
{
    echo "Succesfully deleted";
    header("Location: ../Homepage/home1.php");
}