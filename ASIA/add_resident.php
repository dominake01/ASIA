<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Resident</title>
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
    height: 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

header img {
    height: 120px;
}

.header h1 {
    font-size: 10px;
   
}
  .container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8); /* Add a background color with transparency */
    border-radius: 10px; 
    margin-top: 20px; /* Add some border radius for better appearance */
    margin-bottom: 30px;
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
    width: auto;
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
<h1>Edit Resident information</h1>
</div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" required>
    </div>
    <div class="form-group">
      <label for="middle_name">Middle Name:</label>
      <input type="text" id="middle_name" name="middle_name" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required>
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
    <div class="form-group">
      <label for="street_name">Street Name:</label>
      <input type="text" id="street_name" name="street_name" required>
    </div>
    <div class="form-group">
      <label for="civil_status">Civil Status:</label>
      <select id="civil_status" name="civil_status" required>
        <option value="">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
      </select>
    </div>
    <div class="form-group">
      <label for="occupation">Occupation:</label>
      <input type="text" id="occupation" name="occupation" required>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number:</label>
      <input type="text" id="phone_number" name="phone_number" required>
    </div>
    <button type="submit" class="btn">Add Resident</button>
  </form>

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
      
      $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
      $middle_name = mysqli_real_escape_string($conn, $_POST["middle_name"]);
      $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
      $age = intval($_POST["age"]);
      $birthday = $_POST["birthday"];
      $gender = $_POST["gender"];
      $street_name = mysqli_real_escape_string($conn, $_POST["street_name"]);
      $civil_status = $_POST["civil_status"];
      $occupation = mysqli_real_escape_string($conn, $_POST["occupation"]);
      $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
      
      $sql = "INSERT INTO resident_records (first_name, middle_name, last_name, age, birthday, gender, street_name, civil_status, occupation, phone_number) VALUES ('$first_name', '$middle_name', '$last_name', $age, '$birthday', '$gender', '$street_name', '$civil_status', '$occupation', '$phone_number')";
      
      if ($conn->query($sql) === TRUE) {
          echo "<p>New resident added successfully!</p>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
  }
  ?>
</div>


</body>
<footer>
  &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</html>
