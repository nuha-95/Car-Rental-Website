<?php
require_once("DBconnect.php");

session_start();
$pick_point="";
$drop_point="";
$pick_date="";
$drop_date="";
$uid="";
$car_id="";
if (isset($_POST['car_id'])){
    $pick_point=$_POST['location1'];
    $drop_point=$_POST['location2'];
    $pick_date=$_POST['pick_date'];
    $drop_date=$_POST['drop_date'];;
    $uid=$_SESSION['user_id'];
    $car_id=$_POST['car_id'];

    $sql2="INSERT INTO booking_info (user_id, car_id, pickup_date,dropoff_date,pick_location,drop_location) VALUES('$uid','$car_id','$pick_date','$drop_date','$pick_point','$drop_point')";
    $result_sql2 = mysqli_query($conn, $sql2);

    if($result_sql2 ){
        header("Location: user.php?user_id=$uid");
	    exit;
    }

}
?>