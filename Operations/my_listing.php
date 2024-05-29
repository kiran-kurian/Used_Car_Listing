<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>My Listing</title>
    <style>
        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <center><br><br>
    <h1>Used Vehicle Listing</h1><br>
    <h3>My Listings</h3><br>
    </center>
    <div class="container">
        <div class="row">

            <?php
            include "..//db_connect.php";
            session_start();
            $email = $_SESSION['username'];
            
            $sql1 = "SELECT uname FROM `login` WHERE email='$email'";
            $result1 = $con->query($sql1);
            if ($result1) {
                $row1 = $result1->fetch_assoc();
                $uname = $row1['uname'];

                $sql = "SELECT * FROM cars WHERE uname='$uname'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="../images/<?php echo $row['photo']; ?>" class="card-img-top" alt="image">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text">Price: <?php echo $row['price']; ?></p>
                                <p class="card-text">Variant: <?php echo $row['variant']; ?></p>
                                <p class="card-text">Year: <?php echo $row['year']; ?></p>
                                <p class="card-text">Mileage: <?php echo $row['mileage']; ?></p>
                                <p class="card-text">Colour: <?php echo $row['colour']; ?></p>
                                <p class="card-text">Fuel: <?php echo $row['fuel']; ?></p>
                                <p class="card-text">User: <?php echo $row['uname']; ?></p>
                                <p class="card-text">Contact: <?php echo $row['contact']; $id= $row['id']?></p>
                                <a href="deletion.php?id='<?php echo $id; ?>'">Delete</a>
                                <a href="update.php?id1='<?php echo $id; ?>'">Update</a>
                                </div>
                            </div>
                        </div>

            <?php
                    }
                } else {
                    echo "No data available!";
                }
            } else {
                echo "Error retrieving data!";
            }

            $con->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
