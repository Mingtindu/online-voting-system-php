<?php
session_start();
if(!isset($_SESSION['userData'])){
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
                    <div class="nav-option option1"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" 
                            alt="userinfo"> 
                            <a href="dashboard.php"style="text-decoration: none; color: white;"><h3> User info</h3> </a>
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
                <h1>User information</h1>
                <div class="profile">
                  
                        <?php
                $userData = $_SESSION['userData'];

                // Display user information
                $name = $userData['name'];
                $mobile = $userData['mobile'];
                $address = $userData['address'];
                $photo = $userData['photo'];

                echo "<p><strong>Name:</strong> $name </p>";
                echo "<p><strong>Mobile:</strong> $mobile </p>";
                echo "<p><strong>Address:</strong> $address </p>";
                echo "<p><strong>Photo:</strong> <img src='../uploads/$photo' alt='User Photo'> </p>";
                
                ?>

             </div>     
            
        
        </div> 
    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>