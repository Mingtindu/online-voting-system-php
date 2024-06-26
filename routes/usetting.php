<?php
session_start();
if(!isset($_SESSION['userData'])){
    header("location: ../");
    exit();
}

   

if (isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']);

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
    <title>user-Dashboard</title> 
    <link rel="stylesheet" 
          href="style.css"> 
    <link rel="stylesheet" 
          href="responsive.css"> 
          <style>
            a{
                text-decoration:none;
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
                width: 200px;
                height: 200px;
                border-radius: 50%;
                margin-top: 10px;
            }
            .info-change{
                width: 100px;
                height: 40px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background: rgb(87, 81, 81);
                color: white;
            }
            .info-change:hover{
                cursor: pointer;
                background: rgb(120, 138, 120);

            }
            .info-change a{
                color: rgb(0, 0, 0);
                font-size: 14px;
                font-weight: 500;
            }
</style>
</head> 
  
<body> 
    
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
                            alt="userinfo"> 
                            <a href="dashboard.php"><h3> User info</h3> </a>
                    </div> 
  
                    <div class="option2 nav-option"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles"> 
                        <a href="voter.php"><h3> Elections</h3> </a>
                    </div> 
  
                    <div class="nav-option option3"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                            class="nav-img" 
                            alt="report"> 
                        <a href="candidate.php"><h3> Candidate</h3></a> 
                    </div> 
  
  
                    <div class="nav-option option5"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                            class="nav-img" 
                            alt="blog"> 
                            <a href="results.php"><h3> Results</h3></a> 
                    </div> 
  
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings"> 
                            <a style="text-decoration: none; color: white;" href="usetting.php"><h3> Setting</h3></a>  
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
    <h1>User information</h1>
    <div class="profile" id="userProfile">
        <?php
        $userData = $_SESSION['userData'];

        // Display user information
        $name = $userData['name'];
        $mobile = $userData['mobile'];
        $address = $userData['address'];
        $photo = $userData['photo'];

        echo "<p><strong>Name:</strong> <span id='name'>$name</span></p>";
        echo "<p><strong>Mobile:</strong> <span id='mobile'>$mobile</span></p>";
        echo "<p><strong>Address:</strong> <span id='address'>$address</span></p>";
        echo "<p><img src='../uploads/$photo' alt='User Photo'></p>";
        ?>
    <button class="info-change"><a href="#" onclick="toggleEditSection()">Edit User Info</a> </button>
    </div>    
   
    <div class="edit-section" id="editSection" style="display: none;">
        <!-- Your edit form goes here -->
        <form action="../api/userEdit.php" method="post">
            <label for="newName">New Name:</label>
            <input type="text" id="newName" name="newName"><br><br>
            <input name="userId" type="hidden" value="<?php echo $userData['id'] ?>">
            
            <label for="newMobile">New Mobile:</label>
            <input type="text" id="newMobile" name="newMobile"><br><br>
            
            <label for="newAddress">New Address:</label>
            <input type="text" id="newAddress" name="newAddress"><br><br>
            
            <button type="submit">Save</button>
        </form>
    </div>
</div>

<script>
    function toggleEditSection() {
        var editSection = document.getElementById("editSection");
        if (editSection.style.display === "none") {
            editSection.style.display = "block";
        } else {
            editSection.style.display = "none";
        }
    }
</script>

    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>