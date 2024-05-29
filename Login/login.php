<?php
session_start();
include "../db_connect.php";
include "login.html";
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT `password` FROM `login` WHERE `email`='$email'";
    $result=$con->query( $sql );
    if($result)
    {
        if($result->num_rows> 0)
        {
            $row=mysqli_fetch_array($result);
            $pass= $row["password"];
            if($pass== $password)
            {
                $_SESSION['username'] = $email;
                echo "Succesffully Logged In";
                header("Location: ../Homepage/home1.php");
                exit();
            }
            else
            {
                echo "Invalid Credentials";
            }
        }
    }
    
}
$con->close();
?>