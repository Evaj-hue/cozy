<?php
session_start();

include_once("connections/connection.php");
$con = connection(); // Assuming this initializes $con for mysqli

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = mysqli_prepare($con, "SELECT * FROM admins WHERE email = ?");
    
    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        // Get result set
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if user exists
        if ($row = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                
                // Redirect to admin dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                // Password is incorrect
                $_SESSION['login_error'] = "Incorrect password.";
            }
        } else {
            // User with that email doesn't exist
            $_SESSION['login_error'] = "User with that email doesn't exist.";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle prepare error
        die("Prepare statement failed: " . mysqli_error($con));
    }

    // Close connection
    mysqli_close($con);

    // Redirect back to login page on failure
    header("Location: login.php");
    exit();
} else {
    // Redirect back to login page if accessed without POST method
    header("Location: login.php");
    exit();
}
?>