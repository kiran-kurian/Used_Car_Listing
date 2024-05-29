<?php
session_start();
include "../db_connect.php"; 
?>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="home1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .card-details {
            height: 200px;
            overflow: hidden; 
        }
        
        

        .search-container {
            display: flex;
            align-items: center;
            position: absolute;
            top: 100;
            right: 0;
            padding: 10px;
            background-color: transparent;
        }

        .search-bar {
            background-color: white; 
            border: 1px solid #ced4da;
            color: black; 
            margin-right: 5px; 
        }
        .login {
            text-align: center;
            margin-top: 10px; 
        }
        
    </style>

<div class="search-container">
    <form action="../Operations/search.php" method="POST">
        <input type="text" class="form-control search-bar" placeholder="Search" name="search1">
        <input type="submit" name="search" value="Search" class="btn btn-primary">
    </form>
</div>


</head>
<body>
    <h1>Used Vehicle Listing</h1>
    <div class="login">
        <a href="../Operations/insert.php" id="add">Add new</a>
        <a href="../Operations/my_listing.php">My Listings</a>
        <a href="../Homepage/home.php" id="log">Logout</a>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $sql = "SELECT * FROM cars";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="../images/<?php echo $row['photo']; ?>" class="card-img-top img-fluid" alt="image">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <div class="card-details overflow-hidden">
                                    <p class="card-text">Price: <?php echo $row['price']; ?></p>
                                    <p class="card-text">Variant: <?php echo $row['variant']; ?></p>
                                    <p class="card-text">Year: <?php echo $row['year']; ?></p>
                                    <p class="card-text">Mileage: <?php echo $row['mileage']; ?></p>
                                    <p class="card-text">Colour: <?php echo $row['colour']; ?></p>
                                    <p class="card-text">Fuel: <?php echo $row['fuel']; ?></p>
                                    <p class="card-text">User: <?php echo $row['uname']; ?></p>
                                    <p class="card-text">Contact: <?php echo $row['contact']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No data found in the database.";
            }
            $con->close();
            ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
