<?php

@include 'DBconnect.php';
// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database Connection


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query_admin = "SELECT * FROM admin_login WHERE username_admin='$username' AND password_admin='$password'";
    $query_user = "SELECT * FROM user_login WHERE username='$username' AND password='$password'";

    $result_admin = $conn->query($query_admin);
    $result_user = $conn->query($query_user);

    if ($result_admin->num_rows == 1) {
        // Set session variables for admin
        $_SESSION['username'] = $username;

        $_SESSION['role'] = 'admin';
        $_SESSION['start']=time();
        $_SESSION['expire']=$_SESSION['start']+(60*10);

        header('location: admin.php');
        exit();
    } elseif ($result_user->num_rows == 1) {
    	  // Fetch student ID and store it in a session variable

        
        
        $user_data = $result_user->fetch_assoc();
        $userID = $user_data['id'];
        $_SESSION['user_id'] = $user_data['id'];
        // Set session variables for student
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        $_SESSION['start']=time();
        $_SESSION['expire']=$_SESSION['start']+(60*10);
        $conn->close();
        header("location: user.php?user_id=$userID");
        exit();
    } else {
        echo "Incorrect ID or password";
        exit();
    }
    

}

?>
