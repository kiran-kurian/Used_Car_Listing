<?php
session_start();
include "../db_connect.php";
include "insert.html";

$sql1 = "SELECT `uname`,`contact` FROM `login` WHERE email='".$_SESSION['username']."'";
$result1 = $con->query($sql1);
$row1 = $result1->fetch_assoc();
$user = $row1['uname'];
$contact= $row1['contact'];

if (isset($_POST["insert"])) {
    $name = $_POST['cname'];
    $price = $_POST['price'];
    $variant = $_POST['variant'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];
    $color = $_POST['color'];
    $fuel = $_POST['fuel'];
    

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO cars (`name`, `price`, `variant`, `year`, `mileage`, `colour`, `fuel`, `uname`, `contact`, `photo`) VALUES ('$name', '$price', '$variant', '$year', '$mileage', '$color', '$fuel', '$user', '$contact', '$fileName')";
                $result = $con->query($sql);

                if ($result) {
                    echo "Success";
                    header("Location: ../Homepage/home1.php");
                } else {
                    echo "Error: " . $con->error;
                }
            } else {
                echo "Error uploading file";
            }
        } else {
            echo "Invalid file type";
        }
    }
}
$con->close();
?>
