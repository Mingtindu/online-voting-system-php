<?php
session_start();
if(!isset($_SESSION['adminData'])){
    header("location: ../");
    exit();
}

?>
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <style>
        .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
    }
    .btn {
        display: block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
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
  
    </header> 
  
    <div class="main-container"> 
        <div class="navcontainer"> 
            <nav class="nav"> 
                <div class="nav-upper-options"> 
                    <div class="nav-option option1"> 
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
                        <a href="managegroup.php"><h3> Manage Elections</h3></a> 
                    </div> 
  
                    <div class="nav-option option4"> 
                        <img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                            class="nav-img" 
                            alt="institution"> 
                            <a href="candidatemanage.php"><h3> Manage Candidates</h3></a> 
                        
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
            <div class="report-container"> 
                <div class="report-header"> 
                    <h1 class="recent-Articles">Admin Info</h1> 
                    
                </div> 
  
                <div class="report-body"> 
                    <div class="container">
                        <?php
                         $email = $_SESSION['adminData']['email'];
                         $password = $_SESSION['adminData']['password'];
                     
                         // You can use $email and $password as needed in your code
                         echo "Email: $email <br>";
                         echo "Password: $password";

                        ?>
                         <button class="btn" onclick="showModifyForm()">Modify Details</button>

                    </div>
                   
                </div> 
                <div id="modifyModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Modify Admin Details</h2>
        <form id="modifyForm">
            <label for="newEmail">New Email:</label>
            <input type="email" id="newEmail" name="newEmail" required><br><br>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required><br><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
</div>

<script>
function showModifyForm() {
    var modal = document.getElementById("modifyModal");
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById("modifyModal");
    modal.style.display = "none";
}

document.getElementById("modifyForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var form = document.getElementById("modifyForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText); // You can display a success message or handle the response as needed
            closeModal();
        }
    };
    xhr.open("POST", "../api/modify_admin.php", true);
    xhr.send(formData);
});
</script>
            </div> 
        </div> 
    </div> 
  
    <script src="./index.js"></script> 
</body> 
</html>