<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome,admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="index.html" class="logo"><img src="images/icon.jpg" alt=""></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="alluser.php">Users</a></li>
            <li><a href="allbookings.php">Bookings</a></li>
        </ul>
        <div class="header-btn">
            
            <a href="signout.php" class="sign-in">Sign Out</a>
        </div>
    </header>
    <!--Home-->
    <section class="services" id="services">

        <div class="services-container">
            <a href="addcar.php" class="add-btn">Add New Car</a>
            <?php


            require_once("DBconnect.php");

            

            

            $sql = "SELECT * FROM car_info"; 

            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                
                while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="box">
                    <div class="box-content">
                        <div class="box-img">
                            <img src="<?php echo $row['img_url']; ?>" alt="">
                        </div>
                        <div class="details">
                            <p><?php echo $row["availability"]; ?></p>
                            <h3><?php echo $row["title"]; ?></h3>
                            <h2><?php echo $row["price"]; ?></h2>
                            <br>
                            <a href="update_car.php?cid=<?php echo $row["car_id"]; ?>" class="btn">Update</a>
                            <a href="delete_car.php?cid=<?php echo $row["car_id"]; ?>" class="cancel-btn">Delete</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>

        </div>
        </section>

    <script src="main.js"></script>
    
</body>
</html>