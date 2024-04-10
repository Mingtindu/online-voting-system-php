<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidate Modify</title>
  <style>
    /* Your CSS styles here */
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Candidate Modify</h2>
    <?php
    require('../api/connect.php'); 

    // Check if candidate ID is provided via form submission
    if(isset($_POST['candidate_id'])) {
      $candidate_id = $_POST['candidate_id'];
      // Fetch candidate data from the database
      $sql = "SELECT * FROM candidate WHERE id = $candidate_id";
      $result = mysqli_query($connect, $sql);
      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="../api/updateCandidate.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">
      </div>
      <input type="hidden" name="candidate_id" value="<?php echo $row['id']; ?>">
      <button type="submit" class="btn">Confirm</button>
    </form>
    <?php
      } else {
        echo "Candidate not found.";
      }
    } else {
      echo "Candidate ID not provided.";
    }
    ?>
  </div>
</body>
</html>
