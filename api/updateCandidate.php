<?php
// Include the database connection file
require('../api/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['candidate_id']) && isset($_POST['name']) && isset($_POST['address'])) {
        // Sanitize input data to prevent SQL injection
        $candidate_id = mysqli_real_escape_string($connect, $_POST['candidate_id']);
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);

        // Update candidate information in the database
        $sql = "UPDATE candidate SET name='$name', address='$address' WHERE id='$candidate_id'";

        if (mysqli_query($connect, $sql)) {
            echo "Candidate information updated successfully";
        } else {
            echo "Error updating candidate information: " . mysqli_error($connect);
        }
    } else {
        echo "All fields are required";
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($connect);
?>
