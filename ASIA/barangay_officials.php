<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barangay Officials</title>
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

.table-container {
    max-height: 500px; 
    overflow-y: auto;
    margin-top: 40px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff; /* White background for better contrast */
    border: 1px solid #4caf50; /* Border color */
    border-radius: 5px; /* Slightly rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for modern look */
}

table th, table td {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
}

table th {
    background-color: #4caf50;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray for alternating rows */
}

.btn {
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn:hover {
    opacity: 0.8;
}

.add-btn {
    background-color: #FFC107; 
}

.add-btn:hover {
    background-color: #FFA000; 
}

.back-btn {
    background-color: red; 
    margin-left: 10px;
}

.back-btn:hover {
    background-color: darkred;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.action-btn {
    display: flex;
    gap: 10px;
}

.action-btn .btn {
    padding: 5px 10px;
}

.action-btn .btn.edit {
    background-color: #4caf50; /* Green color for Edit button */
}

.action-btn .btn.delete {
    background-color: red; /* Red color for Delete button */
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
  <h1>Barangay Officials</h1>
</header>

<div class="container">
  <div class="btn-group">
    <a href="add_official.php" class="btn add-btn"><i class="fas fa-plus"></i> Add Official</a>
    <a href="homepage.php" class="btn back-btn" style="width: 130px;"><i class="fas fa-arrow-left"></i> Back</a>
  </div>

  <!-- Table container -->
  <div class="table-container">
    <!-- Table for displaying officials -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Position</th>
          <th>Age</th>
          <th>Birthday</th>
          <th>Gender</th>
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
        $sql = "SELECT id, name, position, age, birthday, gender FROM officials";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["position"]. "</td>
                        <td>" . $row["age"]. "</td>
                        <td>" . $row["birthday"]. "</td>
                        <td>" . $row["gender"]. "</td>
                        <td class='action-btn'>
                          <a href='edit_official.php?id=" . $row["id"] . "' class='btn edit'><i class='fas fa-edit'></i> Edit</a>
                          <a href='delete_official.php?id=" . $row["id"] . "' class='btn delete'><i class='fas fa-trash'></i> Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>

<footer>
    &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</body>
</html>
