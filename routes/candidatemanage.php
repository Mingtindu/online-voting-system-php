<?php
session_start();
if(!isset($_SESSION['userData'])){
    header("location: ../");
    exit();
}
else{
    require("../api/connect.php");
    if(isset($_POST['modify_candidate'])){
        // Handle modify candidate action
        $id = $_POST['id']; 
        $modified_name = $_POST['modified_name'];
        $modified_address = $_POST['modified_address'];
        
        // Update the candidate information in the database
        $update_sql = "UPDATE candidate SET name='$modified_name', address='$modified_address' WHERE id='$id'";
        if(mysqli_query($connect, $update_sql)){
            echo "Candidate information updated successfully.";
        } else{
            echo "Error updating candidate information: " . mysqli_error($connect);
        }
    }

    if(isset($_POST['delete_candidate'])){
        // Handle delete candidate action
        $id = $_POST['id']; // Assuming you have a hidden input field containing candidate id
        
        // Delete the candidate from the database
        $delete_sql = "DELETE FROM candidate WHERE id='$id'";
        if(mysqli_query($connect, $delete_sql)){
            echo "Candidate deleted successfully.";
        } else{
            echo "Error deleting candidate: " . mysqli_error($connect);
        }
    }
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
                        <h3> Admin Info</h3> 
                    </div> 
  
                    <div class="nav-option option3"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="managegroup.html"><h3> Manage Eletions</h3></a> 
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
                        <h3 class="t-op">Name</h3> 
                        <h3 class="t-op">Address</h3> 
                        <h3 class="t-op">Vote count</h3> 
                        <h3 class="t-op">Action</h3> 
                    </div> 
  
<!--                     
                        <div class="item1"> 
                            <h3 class="t-op-nextlvl">Article 73</h3> 
                            <h3 class="t-op-nextlvl">2.9k</h3> 
                            <h3 class="t-op-nextlvl">210</h3> 
                            <h3 class="t-op-nextlvl label-tag">Published</h3>  -->
                          
                          
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
                                echo "<h3 class='t-op-nextlvl label-tag'>" ."<button name ='modify_candidate' type='submit'>modify</button> <button name ='delete_candidate' type='submit'>delete</button>" . "</h3>";
                               
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