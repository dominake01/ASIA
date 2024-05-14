<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Official</title>
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
    height: 80px;
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
  margin-top: 10px;/* Add some border radius for better appearance */
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
  width: 35%;
}

.btn:hover {
  background-color: #45a049;
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
<h1>Add Official</h1>
</div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="position">Position:</label>
      <input type="text" id="position" name="position" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" id="age" name="age" required>
    </div>
    <div class="form-group">
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday" required>
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <button type="submit" class="btn">Add Official</button>
    <br>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barangay_system";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $age = intval($_POST["age"]); // Convert to integer
    $birthday = $_POST["birthday"]; 
    $gender = $_POST["gender"]; 
    
    // Insert data into database
    $sql = "INSERT INTO officials (name, position, age, birthday, gender) VALUES ('$name', '$position', $age, '$birthday', '$gender')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to barangay_officials.php
        header("Location: barangay_officials.php");
        exit(); // Stop further execution
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    
    $conn->close();
}
?>
  </form>
</div>

<footer>
  &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</body>
</html>
