<?php
session_start();

require('./connect.php');

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $newEmail = filter_var($_POST["newEmail"], FILTER_SANITIZE_EMAIL);
    $newPassword = $_POST["newPassword"]; // You may want to apply additional validation

    // Update the admin data in the database
    $sql = "UPDATE admindetails SET email='$newEmail', password='$newPassword' WHERE id=1"; 

    if ($connect->query($sql) === TRUE) {
        // Update the session data as well
        $_SESSION['adminData']['email'] = $newEmail;
        $_SESSION['adminData']['password'] = $newPassword;

        echo "Admin details updated successfully!";
    } else {
        echo "Error updating admin details: " . $connect->error;
    }
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request!";
}

// Close the connection
$connect->close();
?>
