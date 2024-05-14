<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resident Records</title>
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

header h1 {
    font-size: 40px;
    margin-top: 10px;
}

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
  }

  h1 {
    margin-bottom: 30px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    margin-top: 40px;
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 15px;
    text-align: left;
  }

  th {
    background-color: #4caf50;
    color: white;
  }

  .btn {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  .btn:hover {
    background-color: #45a049;
  }

  .back-btn {
    background-color: red;
  }

  .back-btn:hover {
    background-color: darkred;
  }

  .btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center; /* Align items in the center */
    margin-bottom: 20px;
  }

  .action-btn {
    display: flex;
    gap: 10px;
  }

  .action-btn .btn {
    padding: 5px 10px;
    min-width: 70px; /* Ensures buttons are of minimum width */
    text-align: center;
  }
  
  .action-btn .btn i {
    margin-right: 5px;
  }
  footer {
    background-color: #2E7D32; /* Dark green */
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
    height: 50px;
}

</style>
</head>
<body>
<header>
  <img src="./images/logo.png">
  <h1>Resident Records</h1>
</header>

<div class="container">

  <div class="btn-group">
    <a href="add_resident.php" class="btn" style="background-color:  #FFC107;"><i class="fas fa-plus"></i> Add Resident</a>
    <a href="homepage.php" class="btn back-btn" style="width: 130px;"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  
  <!-- Table for displaying officials -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Street Name</th>
        <th>Civil Status</th>
        <th>Occupation</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
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
      
      // Fetch data from database
      $sql = "SELECT id, first_name, middle_name, last_name, age, birthday, gender, street_name, civil_status, occupation, phone_number FROM resident_records";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . $row["id"] . "</td>
                      <td>" . $row["first_name"] . "</td>
                      <td>" . $row["middle_name"] . "</td>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["age"] . "</td>
                      <td>" . $row["birthday"] . "</td>
                      <td>" . $row["gender"] . "</td>
                      <td>" . $row["street_name"] . "</td>
                      <td>" . $row["civil_status"] . "</td>
                      <td>" . $row["occupation"] . "</td>
                      <td>" . $row["phone_number"] . "</td>
                      <td class='action-btn'>
                        <a href='edit_resident.php?id=" . $row["id"] . "' class='btn'><i class='fas fa-edit'></i> Edit</a> 
                        <a href='delete_resident.php?id=" . $row["id"] . "' class='btn' style='background-color: red;'><i class='fas fa-trash'></i> Delete</a>
                      </td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='12'>No records found</td></tr>";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

</body>
<footer>
  &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</html>
