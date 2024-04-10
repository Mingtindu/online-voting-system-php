<?php
require("../api/connect.php");

if(isset($_POST['delete_candidate'])){
    // Handle delete candidate action
    $candidate_id = $_POST['candidate_id']; // Assuming you have a hidden input field containing candidate id
    
    // Delete the candidate from the database
    $delete_sql = "DELETE FROM candidate WHERE id='$candidate_id'";
    if(mysqli_query($connect, $delete_sql)){
        echo "Candidate deleted successfully.";
    } else{
        echo "Error deleting candidate: " . mysqli_error($connect);
    }
} else {
    echo "Delete action not triggered.";
}

mysqli_close($connect);
?>
