<?php
include "../db_connect.php";
if(isset($_POST["sign"]))
{
    $name=$_POST['pname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['cno'];
    $sql1="SELECT `email` FROM `login` WHERE `email`='$email'";
    $result1=$con->query($sql1);
    if($result1)
    {
        if($result1->num_rows!= 0)
        {
            while($row1 = $result1->fetch_assoc())
            {
                if($row1["email"]==$email)
                {
                    echo "User already registered";
                }
            }
        }
        else
        {
            $sql="INSERT INTO `login` (`uname`, `email`, `password`, `contact`) VALUES ('$name', '$email','$password','$contact')";
            $result=$con->query($sql);
            if($result)
            {
                echo "Succesfully Registered";
                header("Location: ../Homepage/home1.php");
            }
        }
        
    }
    
}
?>