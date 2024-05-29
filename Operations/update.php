<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update Details</title>    
    <style>
        body {
          
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: auto;
        }
        .form-container {
            max-width: 400px;
            width: 100%;
            text-align: center;
            margin-top: auto;
        }
        .form-label {
            text-align: left;
            display: block;
            margin-bottom: 5px; 
        }
        h1, h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Used Car Listing</h1>
        <h3>Update Details</h3>

        <?php
        include "../db_connect.php";
        session_start();
        $id = $_GET['id1'];
        $sql1= "SELECT * FROM cars WHERE `id` = $id";
        $result1 = $con->query($sql1);
        
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
        ?>
        <form method="POST" action="updation.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cname" class="form-label">Name of Vehicle</label>
                <input type="text" name="cname" class="form-control" id="cname" aria-describedby="emailHelp" value="<?php echo $row1['name'];?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="price" value="<?php echo $row1['price'];?>">
            </div>
            <div class="mb-3">
                <label for="variant" class="form-label">Variant</label>
                <input type="text" name="variant" class="form-control" id="variant" value="<?php echo $row1['variant'];?>">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" name="year" class="form-control" id="year" value="<?php echo $row1['year'];?>">
            </div>
            <div class="mb-3">
                <label for="mileage" class="form-label">Mileage</label>
                <input type="number" name="mileage" class="form-control" id="mileage" value="<?php echo $row1['mileage'];?>">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Colour</label>
                <input type="text" name="color" class="form-control" id="color" value="<?php echo $row1['colour'];?>">
            </div>
            <div class="mb-3">
                <label for="fuel" class="form-label">Fuel</label>
                <input type="text" name="fuel" class="form-control" id="fuel" value="<?php echo $row1['fuel'];?>">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input type="file" name="file" class="form-control" id="file">
            </div>
            <input type="hidden" name="id1" value="<?php echo $id; ?>">
            <button type="submit" name="update" class="btn btn-primary" id="update">Update</button>
        </form>
        <?php
            }
        } else {
            echo "No data available";
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
