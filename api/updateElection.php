<?php
// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['id'], $_POST['name'], $_POST['date'], $_POST['time'])) {
        // Get form data
        $electionId = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Include your database connection file
        require('../api/connect.php');

        // Prepare an UPDATE statement
        $sql = "UPDATE elections SET name=?, date=?, time=? WHERE id=?";

        // Use prepared statements to prevent SQL injection
        $stmt = $connect->prepare($sql);

        // Bind parameters to the statement
        $stmt->bind_param("sssi", $name, $date, $time, $electionId);

        // Execute the statement
        if ($stmt->execute()) {
            // Update successful
            echo "Election updated successfully.";
        } else {
            // Error in update
            echo "Error updating election: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $connect->close();
    } else {
        // Required fields not set
        echo "Error: All fields are required.";
    }
} else {
    // Redirect if accessed directly without POST method
    header("Location: modifyElection.php");
    exit();
}
?>
