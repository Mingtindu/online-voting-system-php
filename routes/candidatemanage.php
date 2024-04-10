<?php
session_start();
// if(!isset($_SESSION['userData'])){
//     header("location: ../");
//     exit();
// }

    
?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <style>
        /* Style for report container */
.report-container {
  margin: 20px;
}

/* Style for report header */
.report-header {
  text-align: center;
  margin-bottom: 20px;
}

/* Style for report body */
.report-body {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

/* Style for report topic heading */
.report-topic-heading {
  display: flex;
  justify-content: space-between;
  background-color: #f0f0f0;
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

/* Style for individual candidate item */
.candidate-item {
  width: calc(25% - 20px); /* Adjust the width as needed for responsiveness */
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}

.t-op {
  font-weight: bold;
  margin-bottom: 10px;
}

.button-container {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

button {
  padding: 8px 16px;
  margin: 0 5px;
  cursor: pointer;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
}

button:hover {
  background-color: #0056b3;
}

    </style>
   
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
                            <a href="adminDashboard.php"><h3> Admin Info</h3></a> 
                    </div> 
  
                    <div class="nav-option option3"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="managegroup.php"><h3> Manage Eletions</h3></a> 
                    </div> 
  
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution"> 
                            <a href="candidatemanage.php" style="color: white;"><h3> Manage Candidate</h3></a> 
                        
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
  
            <div class="box-container">
                
  
               
  
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Candidates</h1>  
                </div> 
  
                <div class="report-body"> 
                    <div class="report-topic-heading"> 
                       
                    </div>                
                          
                          
                        <?php
                        require('../api/connect.php');
                        $sql = "SELECT * FROM candidate";
                        $result = mysqli_query($connect,$sql);
                    
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                // Echo the retrieved data within your HTML structure
                                echo "<div class='candidate-item'>";
                                echo "<h3 class='t-op'>" . $row["name"] . "</h3>";
                                echo "<h3 class='t-op'>" . $row["address"] . "</h3>";
                                echo "<h3 class='t-op'>" . $row["voteCount"] . "</h3>";
                                echo "<div class='button-container'>";
                                echo "<form method='post' action='../api/candidateModify.php'>";
                                echo "<input type='hidden' name='candidate_id' value='" . $row["id"] . "'>";

                                echo "<input type='hidden' name='candidate_id' value='" . $row["id"] . "'>";
                                echo "<button name='modify_candidate' type='submit'>Modify</button>";
                                echo "</form>";
                                echo "<form method='post' action='../api/candidateDelete.php'>";
                                echo "<input type='hidden' name='candidate_id' value='" . $row["id"] . "'>";
                                echo "<input type='hidden' name='candidate_id' value='" . $row["id"] . "'>";
                                echo "<button name='delete_candidate' type='submit'>Delete</button>";
                                echo "</form>";


                                
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        
                        else {
                            echo "0 results";
                        }
                      
                        ?>
                       
  
  
                    </div> 
                </div> 
                <div class="report-container">
           
           <div class="input-section">
           <h2>Candidate</h2>
               <form action="../api/candidateAdd.php" method="post">
                   
               <label for="c-name">Name<input type="text" name="c-name></label>
               <label for="c-address">Address<input type="text" name="c-address" ></label>
               <label for="c-des">Description <textarea id="description" name="c-des" rows="4" cols="50" placeholder="Enter your description here..."></textarea></label>
               <input type="submit" value="Add Candidate">
               </form>
               
           </div>
        
           </div>
            </div> 
        </div> 
    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>