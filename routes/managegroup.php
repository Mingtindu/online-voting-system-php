<?php
session_start();
if(!isset($_SESSION['adminData'])){
    header("location: ../");
    exit();
}

else{

}

?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"> 
    <meta name="viewport" 
          content="width=device-width,  
                   initial-scale=1.0"> 
    <title>Admin Dashboard</title> 
    <link rel="stylesheet" 
          href="style.css"> 
    <link rel="stylesheet" 
          href="responsive.css"> 
          
    <style>
        .input-section{
            text-align:center;
            justify-content:center;
            display:flex;
            flex-direction:column;
        }
        .input-section h1{
            text-align:center;
            font-size:40px;
            font-weight:500;

        }
        .input-section input{
            width:150px;
            margin:10px;
            gap:20px;
        }
        .input-section label{
            margin-right:10px;
        }
        .items {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    button{
        justify-content: center;
        text-align: center;
        font-size: 25px;
        font-weight: 600;
        height: 30px;
        margin:10px;
        display:flex;
        width:80px;
        background: #767ab5;
        color:black;
        cursor: pointer;
        border-radius: 8px;
        border: 1px solid black;
    }
    button:hover{
        background: #3a42b6;
    }
    .input-section {
    max-width: 400px;
    margin: 0 auto;
    }

    .input-section h2 {
        margin-bottom: 20px;
    }

    .dis {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"] {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width:80px;
    }
    .btn:hover {
        background-color: #45a049;
    }

    
    </style>
</head> 
  
<body> 
    
    <!-- for header part -->
    <header> 
  
        <div class="logosec"> 
            <div class="logo">Voting System</div> 
            <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                class="icn menuicn" 
                id="menuicn" 
                alt="menu-icon"> 
        </div> 
  
        <div class="searchbar"> 
            <input type="text" 
                   placeholder="Search"> 
            <div class="searchbtn"> 
              <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon"> 
              </div> 
        </div> 
  
    </header> 
  
    <div class="main-container"> 
        <div class="navcontainer"> 
            <nav class="nav"> 
                <div class="nav-upper-options"> 
                    <div class="nav-option option2"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" 
                            alt="dashboard"> 
                            <a href="adminDashboard.php"><h3> Admin info</h3></a>
                    </div> 
  
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="managegroup.php" style="color: white;"><h3> Manage Eletions</h3></a> 
                    </div> 
  
                    <div class="nav-option option4"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution"> 
                            <a href="candidatemanage.php"><h3> Manage Candidate</h3></a> 
                        
                    </div> 
                    
  
                    <div class="nav-option option6"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings"> 
                        <h3> Settings</h3> 
                    </div> 
  
                    <div class="nav-option logout"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" 
                            alt="logout"> 
                            <a href="logout.php"><h3> Logout</h3></a> 
                    </div> 
  
                </div> 
            </nav> 
        </div> 
        <div class="main"> 
  
            <div class="searchbar2"> 
                <input type="text" 
                       name="" 
                       id="" 
                       placeholder="Search"> 
                <div class="searchbtn"> 
                  <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                        class="icn srchicn" 
                        alt="search-button"> 
                  </div> 
            </div> 
  
            <div class="box-container"> 
            <?php
                    require('../api/connect.php');

                    $sql = "SELECT id, name, date, time FROM elections"; // Include 'id' in the SELECT statement
                    $result = $connect->query($sql);

                    // Check if the query executed successfully
                    if ($result) {
                        // Get the number of rows returned by the query
                        $num_elections = $result->num_rows;
                        // echo "Number of elections in the database: " . $num_elections;
                    } else {
                        echo "Error executing query: " . $connect->error;
                    }

                    $connect->close();
                ?>
                
                <?php
                                // Include the file to establish database connection
                                require('../api/connect.php');

                                // SQL query to select all candidates from the 'candidate' table
                                $sql = "SELECT * FROM candidate";

                                // Execute the query
                                $result = mysqli_query($connect, $sql);

                                // Check if there are any results
                                if ($result) {
                                    // Get the number of rows returned by the query
                                    $num_candidates = mysqli_num_rows($result);
                                    
                                    // // Output the number of candidates
                                    // echo "Number of candidates in the database: " . $num_candidates;
                                } else {
                                    // If there's an error in executing the query, display the error
                                    echo "Error executing query: " . mysqli_error($connect);
                                }

                                // Close the database connection
                                mysqli_close($connect);
                            ?>

  
                <div class="box box1"> 
                    <div class="text"> 
                        <h2 class="topic-heading"><?php echo $num_elections ?></h2> 
                        <h2 class="topic">No of Election</h2> 
                    </div> 
  
                    <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
                        alt="Views"> 
                </div> 
                    
  
                <div class="box box2"> 
                    <div class="text"> 
                        <h2 class="topic-heading">150</h2> 
                        <a href=""><h2 class="topicLikes</h2>"></a> 
                    </div> 
  
                    <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png" 
                         alt="likes"> 
                </div> 
  
                <div class="box box3"> 
                    <div class="text"> 
                        <h2 class="topic-heading"><?php echo $num_candidates    ?></h2> 
                        <h2 class="topic">No of Candidate</h2> 
                    </div> 
  
                    <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
                        alt="comments"> 
                </div> 
  
                
            </div> 
  
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Elections</h1>  
                </div> 
  
                <div class="report-body"> 
                    <div class="report-topic-heading"> 
                        <h3 class="t-op">Name</h3> 
                        <h3 class="t-op">Date</h3> 
                        <h3 class="t-op">Time</h3> 
                        <h3 class="t-op">Action</h3> 
                    </div> 
  
                    <div class="items"> 
                                                    <?php
                                require('../api/connect.php');

                                $sql = "SELECT id, name, date, time FROM elections"; // Include 'id' in the SELECT statement
                                $result = $connect->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '<div class="item1">';
                                        echo '<h3 class="t-op-nextlvl" style="width: 80px;">' . $row["name"] . '</h3>';
                                        echo '<h3 class="t-op-nextlvl">' . $row["date"] . '</h3>';
                                        echo '<h3 class="t-op-nextlvl">' . $row["time"] . '</h3>';
                                        echo '<span>';
                                        echo '<a href="../api/deleteElection.php?id=' . $row["id"] . '" onclick="return confirmDelete();"><button class="t-op-nextlvl">Delete</button></a>';
                                        echo '<a href="../api/modifyElection.php?id=' . $row["id"] . '"><button class="t-op-nextlvl">Modify</button></a>';
                                        echo '</span>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $connect->close();
                                ?>


                    </div> 
                    
                </div> 
            </div> 
            <div class="report-container">
           
            <div class="input-section">
            <h2>Add Elections</h2>
               <div class="dis">
                <form action="../api/electionAdd.php" method="post">
                    
                    <label for="e-name">Name<input type="text" name="e-name"></label>
                    <label for="e-date">Date<input type="date" name="e-date" ></label>
                    <label for="e-time">Time<input type="time" name="e-time" ></label>
                    <input class="btn" type="submit" value="Add Election">
                    </form>
               </div>
                
            </div>
         
            </div>
        </div> 
   
    </div> 
    <script src="./index.js"></script> 
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this election?");
        }
        </script>
  
</body> 
</html>