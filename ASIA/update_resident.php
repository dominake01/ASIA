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
        // Update existing resident
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $street_name = $_POST['street_name'];
        $civil_status = $_POST['civil_status'];
        $occupation = $_POST['occupation'];
        $phone_number = $_POST['phone_number'];

        $sql = "UPDATE resident_records SET 
                    first_name='$first_name', 
                    middle_name='$middle_name', 
                    last_name='$last_name', 
                    age='$age', 
                    birthday='$birthday', 
                    gender='$gender', 
                    street_name='$street_name', 
                    civil_status='$civil_status', 
                    occupation='$occupation', 
                    phone_number='$phone_number' 
                WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: resident_records.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "Error updating resident: " . $conn->error;
        }
    } else {
        // Add new resident
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $street_name = $_POST['street_name'];
        $civil_status = $_POST['civil_status'];
        $occupation = $_POST['occupation'];
        $phone_number = $_POST['phone_number'];

        $sql = "INSERT INTO resident_records (first_name, middle_name, last_name, age, birthday, gender, street_name, civil_status, occupation, phone_number) 
                VALUES ('$first_name', '$middle_name', '$last_name', '$age', '$birthday', '$gender', '$street_name', '$civil_status', '$occupation', '$phone_number')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: resident_records.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "Error adding new resident: " . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
