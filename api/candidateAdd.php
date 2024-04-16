<?php
// Include the database connection file
require('../api/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    $name=$_POST['name'];
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['des'])) {
        // Sanitize input data to prevent SQL injection
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $description = mysqli_real_escape_string($connect, $_POST['des']);

        // Insert candidate information into the database
        $insert_sql = "INSERT INTO candidate (name, address, description) VALUES ('$name', '$address', '$description')";

        if (mysqli_query($connect, $insert_sql)) {
            echo "Candidate added successfully.";
        } else {
            echo "Error adding candidate: " . mysqli_error($connect);
        }
    } else {
        echo "All fields are required";
        echo $name;
        
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($connect);
?>
