<?php
session_start();
// if(!isset($_SESSION['userData'])){
//     header("location: ../");
//     exit();
// }
// else{

// }

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
            width:400px;
            margin:10px;
            gap:20px;
        }
        .input-section label{
            margin-right:10px;
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
                            <a href="adminDashboard.php"><h3> Admin info</h3></a>
                    </div> 
  
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="managegroup.html" style="color: white;"><h3> Manage Eletions</h3></a> 
                    </div> 
  
                    <div class="nav-option option4"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution"> 
                            <a href="candidatemanage.html"><h3> Manage Candidate</h3></a> 
                        
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
  
                <div class="box box1"> 
                    <div class="text"> 
                        <h2 class="topic-heading">60.5k</h2> 
                        <h2 class="topic">Article Views</h2> 
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
                        <h2 class="topic-heading">320</h2> 
                        <h2 class="topic">Comments</h2> 
                    </div> 
  
                    <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
                        alt="comments"> 
                </div> 
  
                <div class="box box4"> 
                    <div class="text"> 
                        <h2 class="topic-heading">70</h2> 
                        <h2 class="topic">Published</h2> 
                    </div> 
  
                    <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published"> 
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
                        
                    </div> 
  
                    <div class="items"> 
                        <?php
                        require('../api/connect.php');
                      $sql = "SELECT name, date, time FROM elections";
                        $result = $connect->query($sql);
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="item1">';
                                echo '<h3 class="t-op-nextlvl">' . $row["name"] . '</h3>';
                                echo '<h3 class="t-op-nextlvl">' . $row["date"] . '</h3>';
                                echo '<h3 class="t-op-nextlvl">' . $row["time"] . '</h3>';
                               
                                
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
                <form action="../api/electionAdd.php" method="post">
                    
                <label for="e-name">Name<input type="text" name="e-name"></label>
                <label for="e-date">Date<input type="date" name="e-date" ></label>
                <label for="e-time">Time<input type="time" name="e-time" ></label>
                <input type="submit" value="Add Election">
                </form>
                
            </div>
         
            </div>
        </div> 
   
    </div> 
   
  
</body> 
</html>