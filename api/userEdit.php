<?php
// Import database connection
require_once('./connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $newName = $_POST['newName'];
    $newMobile = $_POST['newMobile'];
    $newAddress = $_POST['newAddress'];
    $userId = $_POST['userId'];

    // Sanitize data
    $newName = mysqli_real_escape_string($connect, $newName);
    $newMobile = mysqli_real_escape_string($connect, $newMobile);
    $newAddress = mysqli_real_escape_string($connect, $newAddress);

    // Update data in the database
    $sql = "UPDATE user1 SET name='$newName', mobile='$newMobile', address='$newAddress' WHERE id=$userId"; // Change 'id=1' according to your database structure
    if (mysqli_query($connect, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }

    // Close connection
    mysqli_close($connect);
}
?>
