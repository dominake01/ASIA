<?php
// Check if ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the ID from the URL
    $id = $_GET['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "barangay_system";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to delete record
    $sql = "DELETE FROM officials WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to barangay_officials.php
        header("Location: barangay_officials.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // No ID provided in the URL
    echo "No ID provided.";
}
?>
