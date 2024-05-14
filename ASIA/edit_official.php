<?php
// Check if ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barangay_system";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get the ID from the URL
    $id = $_GET['id'];
    
    // Fetch the official's details from the database
    $sql = "SELECT * FROM officials WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Official found, fetch details
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $position = $row['position'];
        $age = $row['age'];
        $birthday = $row['birthday'];
        $gender = $row['gender'];
    } else {
        // No official found with the given ID
        echo "No official found with ID: $id";
        exit(); // Stop further execution
    }
    
    $conn->close();
} else {
    // No ID provided in the URL
    echo "No ID provided.";
    exit(); // Stop further execution
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and update the database here
    
    // Redirect to the desired location after processing the form
    header("Location: desired_location.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Official</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  header {
    background-color: #2E7D32; /* Dark green */
    padding: 20px;
    text-align: center;
    color: white;
    height: 85px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
  header img{
    height: 85px;
    display: flex;
    align-items: start;
  }
  .header h1 {
    margin: 0;
    color: #333;
    font-size: 20px;
    color: #f4f4f4;
    margin-top: -40px;
}
  .container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8); /* Add a background color with transparency */
    border-radius: 10px; 
    margin-top: 1px;/* Add some border radius for better appearance */
  }
  .header {
    background-color: #4caf50; /* Green color for header */
    color: white;
    padding: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    height: 105px;
    margin-bottom: 50px;
  }
  h1 {
    margin-bottom: 30px;
  }
  .form-group {
    margin-bottom: 20px;
    text-align: left;
  }
  .form-group label {
    display: block;
    margin-bottom: 5px;
  }
  .form-group select, .form-group input {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  .btn {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-bottom: 20px;
    width: 100%; 
  }
  .btn:hover {
    background-color: #45a049;
  }

  .back-btn {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    display: block; 
    margin: 20px auto 0; 
    width: 100px; 
    margin-top: auto;
  }
  .back-btn:hover {
    background-color: darkred;
  }
  footer {
    background-color: #2E7D32; /* Dark green */
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    height: 50px;
}
</style>
</head>
<body>
<header>
    <img src="./images/logo.png">
</header>

<div class="container">
<div class="header"> 
<img src="./images/logo.png" style="height: 80px; margin-bottom: 40px">
<h1>Edit Official information</h1>
</div>
  <form action="update_official.php" method="post">
    <!-- Hidden field to send ID back to update_official.php -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="form-group">
      <label for="position">Position:</label>
      <input type="text" id="position" name="position" value="<?php echo $position; ?>" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" id="age" name="age" value="<?php echo $age; ?>" required>
    </div>
    <div class="form-group">
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>" required>
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
      </select>
    </div>
    <button type="submit" class="btn">Update Official</button>
  </form>
 
</div>
<a href="barangay_officials.php" class="btn back-btn"><i class="fas fa-arrow-left"></i> Back</a>
<footer>
  &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</body>
</html>
