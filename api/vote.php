<?php
session_start();
if (!isset($_SESSION['userData'])) {
    header("location: ../");
    exit(); // Make sure to stop script execution after redirection
}

$userData = $_SESSION['userData'];
require('../api/connect.php');

$sql = "SELECT * FROM elections";
$result = mysqli_query($connect, $sql);

if (isset($_POST['vote']) && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // Check if the user has already voted
    $checkVoteQuery = "SELECT * FROM user1 WHERE id = $userId";

    $result = $connect->query($checkVoteQuery);
    if ($result->num_rows > 0) {
        $chq = "SELECT status FROM user1 WHERE id = $userId";
        $rs = $connect->query($chq);
        if ($rs->fetch_assoc()['status'] == 1) { // Changed $rs to $rs->fetch_assoc()['status']
            $_SESSION['alert_message'] = "You can only vote for one candidate!";
            header("location:../routes/dashboard.php");
            exit(); // Stop script execution after redirection
        } else {
            $candidateId = intval($_POST['candidate_id']);
            $updateQueryCan = "UPDATE candidate SET voteCount = voteCount + 1 WHERE id = $candidateId";
            $updateQueryUser = "UPDATE user1 SET status=1 WHERE id = $userId";
            if ($connect->query($updateQueryCan) === TRUE && $connect->query($updateQueryUser) === TRUE) {
                // Record the user's vote
                $_SESSION['alert_message'] = "Your vote has been recorded successfully!";
                header("location:../routes/dashboard.php");
                exit(); // Stop script execution after redirection
            } else {
                echo "Error updating vote count: " . $connect->error;
            }
        }
    }
}

// Default redirection if none of the conditions above met
header("location:../routes/dashboard.php");
exit(); // Stop script execution after redirection
?>
