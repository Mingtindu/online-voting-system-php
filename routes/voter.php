<?php
session_start();
if(!isset($_SESSION['userData'])){
    header("location: ../");
}


$userData = $_SESSION['userData'];
require('../api/connect.php');
$sql="SELECT * FROM elections"; 
$result=mysqli_query($connect,$sql);


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
    <title>Voter Dahboard</title> 
    <link rel="stylesheet" 
          href="style.css"> 
    <link rel="stylesheet" 
          href="responsive.css"> 
          <style>
            a{
                text-decoration:none;
            }
          
            .election-container {
                font-size:18px;
                text-align:center;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
           
            .candidate {
                display: inline-block;
                margin-right: 20px;
            }
            .candidate img {
                width: 150px;
                height: auto;
                border-radius: 50%;
                margin-bottom: 10px;
            }
            .candidate-name {
                font-weight: bold;
                    }
                    .box-container {
                width: 400px;
                margin: 0 auto;
                border: 1px solid #ccc;
                padding: 20px;
                border-radius: 5px;
                background-color: #f9f9f9;
                text-align: center;
            }

            .profile {
                margin-top: 20px;
            }

            .profile img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                margin-top: 10px;
            }

            .vote-button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
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
  
        <div class="message"> 
            <div class="circle"></div> 
            <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" 
                 class="icn" 
                 alt=""> 
            <div class="dp"> 
              <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" 
                    alt="dp"> 
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
                            <a href="dashboard.php"><h3> User info</h3> </a>
                    </div> 
  
                    <div class="option1 nav-option"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> 
                        <a href="voter.php" style="text-decoration: none; color: white;"><h3> Elections</h3> </a>
                    </div> 
  
                    <div class="nav-option option3"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="candidate.html"><h3> Candidate</h3></a> 
                    </div> 
  
                   
  
                    <div class="nav-option option5"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" 
                            alt="blog"> 
                            <a href="results.html"><h3> Results</h3></a> 
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
                        <h3>Logout</h3> 
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
  
           
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Current elections</h1>  
                </div> 
  
                <div class="report-body"> 
                    <div class="election-container">
                            
                    <?php
                    
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                // Echo the retrieved data within your HTML structure
                                echo "<div class='report-body'>";
                                echo "<div class='election-container'>";
                                echo "<h1 >" . $row["name"] . "</h3>";
                                echo "<p>"."Date:"."       " . $row["date"] . "</p>";
                                echo "<p >"."Time:"."       " . $row["time"] . "</p>";
                             
                               
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 results";
                        }
                      
                        ?>
                        <?php
                        $sql = "SELECT * FROM candidate";
                        $result = mysqli_query($connect, $sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='candidate-section'>";
                                echo "<div class='candidate'>";
                                echo "<h3>" . $row["name"] . "</h3>";
                                echo "<h3>" . $row["address"] . "</h3>";
                                echo "<h3>" . $row["description"] . "</h3>";
                                
                                // Adding a form with a hidden input for candidate ID
                                echo "<form method='post' action='../api/vote.php'>";
                                echo "<input type='hidden' name='candidate_id' value='" . $row["id"] . "'>";
                                echo "<h3><button name='vote' onclick=\"return confirm('Are you sure you want to vote for this candidate?')\" class='vote-button' type='submit'>Vote Now!!</button></h3>";
                                echo "</form>";
                                
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                      
                       
                    </div>


               
   
                </div> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Upcoming elections</h1>  
                </div> 
                <div class="report-body"> 
                    

               
   
                </div>
            </div> 
        </div> 
    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>