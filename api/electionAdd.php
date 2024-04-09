$_SESSION_start();


<?php

require_once('./connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['e-name'];
    $date = $_POST['e-date'];
    $time = $_POST['e-time'];

    // SQL query to insert data into the elections table
    $sql = "INSERT INTO elections (name, date, time) VALUES ('$name', '$date', '$time')";

    // Execute the query
    if ($connect->query($sql) === TRUE) {
        echo "Election added successfully";
    } else {
        echo "Error adding election: " . $connect->error;
    }
}

$connect->close();
?>
