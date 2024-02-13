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
            <?php


            require_once("DBconnect.php");

            

            

            $sql = "SELECT * FROM user_info"; 

            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                
                while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="box">
                    <div class="box-content">
                        <div class="details">
                            <h3>Name</h3>
                            <p><?php echo $row["name"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>Email</h3>
                            <p><?php echo $row["email"]; ?></p>
                        </div>
                        <div class="details">
                            <h3>Phone</h3>
                            <p><?php echo $row["phone"]; ?></p>
                        </div>
                        <div class="details">

                            <a href="update.php?cid=<?php echo $row["user_id"]; ?>" class="btn">Update</a>
                            <a href="delete_user.php?uid=<?php echo $row["user_id"]; ?>" class="cancel-btn">Delete</a>
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