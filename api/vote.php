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

    if ($result->num_rows == 0) {
        if($_SESSION['status']==1){
            echo "You can't vote";
        }else{
        $candidateId = $_POST['candidate_id']; 
        $updateQueryCan = "UPDATE candidate SET vote_count = voteCount + 1 WHERE id = $candidateId";
        $updateQueryUser = "UPDATE user1 SET status=1 WHERE id = $userId";
        if ($connect->query($updateQueryCan) === TRUE&&$connect->query($updateQueryUser) === TRUE) {
            // Record the user's vote
            $insertVoteQuery = "INSERT INTO votes (user_id) VALUES ($userId)";
            if ($connect->query($insertVoteQuery) === TRUE) {
                echo "Vote recorded successfully!";
            } else {
                echo "Error recording vote: " . $conn->error;
            }
        } else {
            echo "Error updating vote count: " . $conn->error;
        }
    }
   header("location:../routes/dashboard.php");
}}

?>