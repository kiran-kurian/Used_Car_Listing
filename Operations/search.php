<!DOCTYPE html>
<html>

<head>
    <title>Search</title>
    <style>
        h1 {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        .card {
            margin: 10px;
        }

        .smaller-image {
            max-width: 100%;
            height: auto;
            max-height: 150px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>Used Car Listing</h1>
        <h3>Search Results</h3>
        <hr>
    </center>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            include "..//db_connect.php";

            if (isset($_POST["search"])) {
                $search = $_POST["search1"];
                $sql = "SELECT * FROM cars WHERE `name` LIKE '%$search%'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="col">
                            <div class="card">
                                <img src="../images/<?php echo $row['photo']; ?>" class="card-img-top smaller-image" alt="image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
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
            <?php
                    }
                } else {
                    echo "No data available";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
