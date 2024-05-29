<?php
session_start();
include "../db_connect.php";

$sql1 = "SELECT `uname`,`contact` FROM `login` WHERE email='".$_SESSION['username']."'";
$result1 = $con->query($sql1);
$row1 = $result1->fetch_assoc();
$user = $row1['uname'];
$contact = $row1['contact'];

if (isset($_POST["update"])) {
  // Retrieve form data
  $id = $_POST['id1']; // Assuming you have an ID field to identify the car
  $name = $_POST['cname'];
  $price = $_POST['price'];
  $variant = $_POST['variant'];
  $year = $_POST['year'];
  $mileage = $_POST['mileage'];
  $color = $_POST['color'];
  $fuel = $_POST['fuel'];

  // Image handling (optional, adjust as needed)
  if (!empty($_FILES["file"]["name"])) {
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array($fileType, $allowTypes)) {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        // Update SQL statement to include photo (if uploaded)
        $sql = "UPDATE cars SET `name` = '$name', `price` = '$price', `variant` = '$variant', `year` = '$year', `mileage` = '$mileage', `colour` = '$color', `fuel` = '$fuel', `uname` = '$user', `contact` = '$contact', `photo` = '$fileName' WHERE `id` = $id";
      } else {
        echo "Error uploading file";
      }
    } else {
      echo "Invalid file type";
    }
  } else {
    // If no image uploaded, keep the existing photo (no change in SQL)
    $sql = "UPDATE cars SET `name` = '$name', `price` = '$price', `variant` = '$variant', `year` = '$year', `mileage` = '$mileage', `colour` = '$color', `fuel` = '$fuel', `uname` = '$user', `contact` = '$contact' WHERE `id` = $id";
  }

  // Execute query
  $result = $con->query($sql);

  if ($result) {
    echo "Record updated successfully";
    header("Location: ../Homepage/home1.php");
    // Optional: Redirect to a confirmation page or previous page
  } else {
    echo "Error updating record: " . $con->error;
  }
}

$con->close();
?>
