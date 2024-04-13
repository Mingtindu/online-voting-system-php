<?php

if(isset($_GET['id'])) {
    // Get the ID parameter value from the URL
    $electionId = $_GET['id'];

    require('../api/connect.php');

    // Prepare a DELETE statement
    $sql = "DELETE FROM elections WHERE id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $connect->prepare($sql);

    // Bind the parameter to the statement
    $stmt->bind_param("i", $electionId);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Election deleted successfully.";
    } else {
        // Error in deletion
        echo "Error deleting election: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $connect->close();
} else {
    // ID parameter not provided in the URL
    echo "Error: Election ID not specified.";
}
?>
