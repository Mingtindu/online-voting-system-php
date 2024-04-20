<?php
session_start();
if(!isset($_SESSION['userData'])){
    header("location: ../");
    exit();
}
else{
    require('../api/connect.php');

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
    <title>candidate</title> 
    <link rel="stylesheet" 
          href="style.css"> 
    <link rel="stylesheet" 
          href="responsive.css"> 
          <style>
            a{
                text-decoration: none;
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
                            <a href="dashboard.php"><h3> User info</h3> </a>
                    </div> 
  
                    <div class="option2 nav-option"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> 
                        <a href="voter.php"><h3> Elections</h3> </a>
                    </div> 
  
                    <div class="nav-option option2"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="candidate.php" ><h3> Candidate</h3></a> 
                    </div> 
  
                   
  
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" 
                            alt="blog"> 
                            <a href="results.php"  style="color: white;"> <h3> Results</h3></a> 
                    </div> 
  
                    <div class="nav-option option6"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings"> 
                            <a href="usetting.php"><h3> Setting</h3></a>  
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
  
                
  
  
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Results</h1> 
                </div> 
                <div class="report-body"> 
                    <div class="report-topic-heading"> 
                        <h3 class="t-op">Name</h3> 
                        <h3 class="t-op">Address</h3> 
                        <h3 class="t-op">Vote count</h3> 
                    </div> 
                   
                <?php
                        $sql = "SELECT * FROM candidate";
                        $result = mysqli_query($connect,$sql);
                    
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                // Echo the retrieved data within your HTML structure
                                echo "<div class='items'>";
                                echo "<div class='item1'>";
                                echo "<h3 class='t-op-nextlvl'>" . $row["name"] . "</h3>";
                                echo "<h3 class='t-op-nextlvl'>" . $row["address"] . "</h3>";
                                echo "<h3 class='t-op-nextlvl'>" . $row["voteCount"] . "</h3>";
                            
                               
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 results";
                        }
                      
                        ?>
  
                
  
                   
  
                       
                      
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>