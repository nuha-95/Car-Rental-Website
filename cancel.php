<?php
require_once("DBconnect.php");
session_start();

if(isset($_GET['bid']) && isset($_GET['uid'])) {
    $booking_id = $_GET['bid'];
    $uid = $_GET['uid'];

    // Query to delete the booking based on booking_id
    $sql = "DELETE FROM booking_info WHERE booking_id = '$booking_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Booking cancellation successful
        // Redirect back to the user page or any appropriate page after cancellation
        header("Location: user.php?user_id=$uid");
        exit();
    } else {
        // Handle any errors that might occur during the cancellation process
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle cases where booking_id is not provided in the URL
    echo "Invalid request. Please provide a valid booking ID.";
}
?>
