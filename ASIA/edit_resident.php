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
    $sql = "SELECT * FROM resident_records WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Official found, fetch details
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $age = $row['age'];
        $birthday = $row['birthday'];
        $gender = $row['gender'];
        $street_name = $row['street_name'];
        $civil_status = $row['civil_status'];
        $occupation = $row['occupation'];
        $phone_number = $row['phone_number'];
    } else {
        // No official found with the given ID
        echo "No resident found with ID: $id";
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
<title>Edit Resident information</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  header {
    background-color: #4caf50; /* Green color for header */
    padding: 10px;
    text-align: center;
    color: white;
    height: auto;
    margin-bottom: 20px;
  }
  header img{
    height: 120px;
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
    margin-top: 70px; /* Add some border radius for better appearance */
    margin-bottom: 100px; /* Add margin to the bottom of the container */
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

  .form-group {
    margin-bottom: 20px;
    text-align: left;
  }
  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
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
    width: 35%;
  }
  .btn:hover {
    background-color: #45a049;
  }
  button.back-button {
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
            margin: 0 auto;
            margin-top: -80px; 
            margin-bottom: 15px;
            width: 100px;
        }

        button.back-button a {
            color: white;
            text-decoration: none;
        }
  footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
    width: auto;
    position: relative; /* Change position to relative */
    clear: both; /* Clear floats */
    bottom: 0;
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
<h1>Edit Resident information</h1>
</div>

<form action="update_resident.php" method="post">
    <!-- Hidden field to send ID back to update_resident.php -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="middle_name">Middle Name:</label>
      <input type="text" id="middle_name" name="middle_name" value="<?php echo htmlspecialchars($middle_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required>
    </div>
    <div class="form-group">
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>" required>
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
      </select>
    </div>
    <div class="form-group">
      <label for="street_name">Street Name:</label>
      <input type="text" id="street_name" name="street_name" value="<?php echo htmlspecialchars($street_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="civil_status">Civil Status:</label>
      <select id="civil_status" name="civil_status" required>
        <option value="Single" <?php if ($civil_status == 'Single') echo 'selected'; ?>>Single</option>
        <option value="Married" <?php if ($civil_status == 'Married') echo 'selected'; ?>>Married</option>
        <option value="Widowed" <?php if ($civil_status == 'Widowed') echo 'selected'; ?>>Widowed</option>
      </select>
    </div>
    <div class="form-group">
      <label for="occupation">Occupation:</label>
      <input type="text" id="occupation" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>" required>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number:</label>
      <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" required>
    </div>
    <button type="submit" class="btn">Update Resident</button>
  </form>
</div>

<button class="back-button"><a href="resident_records.php">Back</a></button>

<footer>
  &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</body>
</html>
