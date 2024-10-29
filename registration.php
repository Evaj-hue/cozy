<?php
include_once("connections/connection.php"); // Ensure this includes and initializes $con
$con = connection(); // Initialize $con

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: login.php");
        exit();
    } else {
        // Handle database errors
        die("Error: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register-CozyRack Inventory Management</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>CozyRack Registration</span></div>
    <form action="" method="post" >
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="username" name="username"required />
      </div>
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="email" name="email"required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="password" name="password" required />
      </div>
      <div class="pass"><a href="login.php">Already have an account?</a></div>
      <div class="row button">
        <input type="submit" value="Sign Up" name="signUp"/>
      </div>
      
    </form>
  </div>
</body>
</html>