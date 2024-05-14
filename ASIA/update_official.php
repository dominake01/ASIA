<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barangay_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ID is provided for updating
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing official
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];

        $sql = "UPDATE officials SET name='$name', position='$position', age='$age', birthday='$birthday', gender='$gender' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: barangay_officials.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "Error updating official: " . $conn->error;
        }
    } else {
        // Add new official
        $name = $_POST['name'];
        $position = $_POST['position'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO officials (name, position, age, birthday, gender) VALUES ('$name', '$position', '$age', '$birthday', '$gender')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: barangay_officials.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "Error adding new official: " . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
