<?php
$servername = "localhost"; // MySQL server
$username = "root";
$password = "";
$database = "cozyrack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['weight'])) {
    $weight = $_GET['weight'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO load_cell_data (weight) VALUES (?)");
    $stmt->bind_param("d", $weight); // "d" indicates decimal type for weight
    
    // Execute the query
    $stmt->execute();
    echo "Data inserted successfully";
    
    // Close the statement and connection
    $stmt->close();
} else {
    echo "No weight data received!";
}

$conn->close();
?>
