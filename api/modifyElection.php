<?php
// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Get the ID parameter value from the URL
    $electionId = $_GET['id'];

    // Include your database connection file
    require('../api/connect.php');

    // Prepare a SELECT statement to fetch election data by ID
    $sql = "SELECT name, date, time FROM elections WHERE id = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $connect->prepare($sql);

    // Bind the parameter to the statement
    $stmt->bind_param("i", $electionId);

    // Execute the statement
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($name, $date, $time);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();
    $connect->close();

    // Display the modification form with pre-filled data
    ?>
    <html>
    <body>
        <h2>Modify Election</h2>
        <form action="updateElection.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $electionId; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br><br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo $time; ?>"><br><br>
            <input type="submit" value="Update">
        </form>
    </body>
    </html>
    <?php
} else {
    // ID parameter not provided in the URL
    echo "Error: Election ID not specified.";
}
?>
