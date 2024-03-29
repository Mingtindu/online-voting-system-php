<?php
session_start();
if(!isset($_SESSION['userData'])){
    header("location: ../");
}



$userData = $_SESSION['userData'];
require('../api/connect.php');
$sql="SELECT * FROM elections"; 
$result=mysqli_query($connect,$sql);
if(isset($_POST['vote']) && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // Check if the user has already voted
    $checkVoteQuery = "SELECT * FROM user1 WHERE id = $userId";
    
    $result = $connect->query($checkVoteQuery);
    if ($result->num_rows > 0) {
        if($_SESSION['status']==1){
            echo "<script>alert('Your vote has been recorded successfully!');</script>";
            echo "You can't vote";
            header("location:../routes/dashboard.php");
            
        }else{
            
        $candidateId = intval($_POST['candidate_id']); 
        echo `this is candidate id  $candidateId`;
        $updateQueryCan = "UPDATE candidate SET voteCount = voteCount + 1 WHERE id = $candidateId";
        $updateQueryUser = "UPDATE user1 SET status=1 WHERE id = $userId";
        if ($connect->query($updateQueryCan) === TRUE&&$connect->query($updateQueryUser) === TRUE) {
            // Record the user's vote
                echo "Successfully voted thank you 1!! ";
                echo "<script>alert('Your vote has been recorded successfully!');</script>";
            
        } else {
            echo "Error updating vote count: " . $connect->error;
        }
    }
   header("location:../routes/dashboard.php");
}}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>