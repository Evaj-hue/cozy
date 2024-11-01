<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CozyRack Inventory Management</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>CozyRack Login</span></div>
    <form action="authenticate.php" method="post" >
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Email" required name="email"/>
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="password" required />
      </div>
      
      <div class="row button">
        <input type="submit" value="Login" name="login" />
      </div>
      <div class="signup-link">Not a member? <a href="registration.php">Signup now</a></div>
    </form>
  </div>
</body>
</html>