<?php
include_once 'DBconnect.php';

if (isset($_GET['cid']) AND isset($_GET['uid'])) {
    session_start();
    $car_id = $_GET['cid'];
    $u_id=$_SESSION['user_id'];
    $sql1= "INSERT INTO rent(car_id,user_id) VALUES('$car_id','$u_id')";
    $result_sql1 = mysqli_query($conn, $sql1);

}
?>
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
    <!--booking-->
    <section class="user-home" id="user-home">
        <div class="form-container">
            <form action="booking.php" method="POST">
                <div class="user-input-box">
                    <span>Select Pick-Up Point</span>
                    <select name="location1" id="location">
                        <option value="" selected disabled>Select Pick-Up Point</option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Dhanmondi">Dhanmondi</option>
                        <option value="Mohakhali">Mohakhali</option>
                        <!-- Add more options as needed -->
                    </select>
                    

                </div>
                <div class="user-input-box">
                    <span>Select Drop-off Point</span>
                    <select name="location2" id="location">
                        <option value="" selected disabled>Select Drop-off Point</option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Dhanmondi">Dhanmondi</option>
                        <option value="Mohakhali">Mohakhali</option>
                        
                    </select>
                    

                </div>
                <div class="user-input-box">
                    <span>Pick-Up Date</span>
                    <input type="date" name="pick_date" id="">
                </div>
                <div class="user-input-box">
                    <span>Drop-off Date</span>
                    <input type="date" name="drop_date" id="">
                </div>
                <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
                <input type="submit" value="Confirm" name="" id="" class="btn">
            </form>

        </div>

    </section>
    <!--ride-->
    <section class="services" id="services">

        <div class="services-container">
            <?php


            require_once("DBconnect.php");

            $car_id = $_GET['cid'];
            $u_id=$_SESSION['user_id'];

            
        
            $sql = "SELECT * FROM car_info WHERE car_id='$car_id'"; 

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