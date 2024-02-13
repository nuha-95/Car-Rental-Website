<?php
// Include DB connection file
require_once 'DBconnect.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if all fields are not empty
    if (!empty($username) && !empty($password) && !empty($email) && !empty($phone)) {
        // Insert into user_info table
        $sql1 = "INSERT INTO user_login (username, password) VALUES ('$username', '$password')";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            // Get the last inserted ID
            $logid = mysqli_insert_id($conn);

            // Insert into user_login table with the retrieved login ID
            $sql2 = "INSERT INTO user_info (name, email, phone, login_id) VALUES ('$name', '$email', '$phone', '$logid')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                echo "Sign Up successful!";
                // Redirect to sign-in page after successful sign-up
                header("Location: signin.html");
                exit();
            } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "All fields are required";
    }
}

// Close database connection
mysqli_close($conn);
?>
