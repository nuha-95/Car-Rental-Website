


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user</title>
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
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
        </ul>
        
        <div class="header-btn">
            
            <a href="signout.php" class="sign-in">Sign Out</a>
        </div>
    </header>

    <section class="services" id="bookings">
        
        <div class="services-container">
            <?php
            require_once("DBconnect.php");
            session_start();

            $sql3 = "SELECT * FROM booking_info WHERE user_id='" . $_SESSION['user_id'] . "'";
 
            $result3 = mysqli_query($conn, $sql3);

            if (mysqli_num_rows($result3) > 0) {
                while ($row = mysqli_fetch_array($result3)) {
                    $car_id = $row["car_id"];
                    $sql4 = "SELECT img_url FROM car_info WHERE car_id='$car_id'";
                    $result4 = mysqli_query($conn, $sql4);
                    if ($result4 && $img = mysqli_fetch_array($result4)) {
            ?>
                <div class="box">
                    <h2>Current Bookings</h2>
                    <div class="box-content">
                        <div class="box-img">
                            <img src="<?php echo $img['img_url']; ?>" alt="">
                        </div>
                        <div class="details">
                            <h3>Booking Id</h3>
                            <p><?php echo $row["booking_id"]; ?></p>
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <div class="details">
                            <h3>Car Id</h3>
                            <p><?php echo $row["car_id"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>PickUp Date</h3>
                            <p><?php echo $row["pickup_date"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>DropOff Date</h3>
                            <p><?php echo $row["dropoff_date"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>PickUp Location</h3>
                            <p><?php echo $row["pick_location"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>DropOff Location</h3>
                            <p><?php echo $row["drop_location"]; ?></p>
                            <br>
                            <a href="cancel.php?bid=<?php echo $row["booking_id"]; ?>&uid=<?php echo $_SESSION['user_id']; ?>" class="cancel-btn">Cancel</a>
                        </div>

                    </div>
                </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </section>
    
    <!--ride-->

    <section class="services" id="services">

        <div class="services-container">
            <?php


            require_once("DBconnect.php");

            

            
        
            $sql = "SELECT * FROM car_info"; 

            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                $uid=$_SESSION['user_id'];
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
                            <a href="rent.php?cid=<?php echo $row["car_id"]; ?>&uid=<?php echo $uid; ?>" class="btn">Rent Now</a>
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