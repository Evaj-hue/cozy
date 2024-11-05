<?php
include_once("connections/connection.php");

// Always start session
session_start();

// Connect to database
$con = connection();


if (isset($_GET['ID'])) { // Ensure the parameter name matches the one used in the URL
    $productID = $_GET['ID'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM rack_product WHERE productID = ?");
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Check if the product exists
    if (!$row) {
        echo '<script>alert("Product not found."); window.location.href = "products.php";</script>';
        exit;
    }

    // Update button function
    if (isset($_POST['update'])) {
        // Sanitize and validate input data
     $ProductName = isset($_POST['ProductName']) ? mysqli_real_escape_string($con, $_POST['ProductName']) : '';
    $Category = isset($_POST['Category']) ? mysqli_real_escape_string($con, $_POST['Category']) : '';
    $shelf = isset($_POST['shelf']) ? mysqli_real_escape_string($con, $_POST['shelf']) : '';
    $UnitsInStock = isset($_POST['UnitsInStock']) ? mysqli_real_escape_string($con, $_POST['UnitsInStock']) : '';
        
       

        // Use a prepared statement to update the product
        $updateStmt = $con->prepare("UPDATE rack_product SET ProductName = ?, Category = ?, shelf = ?, unitsInStock = ? WHERE productID = ?");

        $updateStmt->bind_param("ssiii", $ProductName, $Category, $shelf, $UnitsInStock, $productID);

        if ($updateStmt->execute()) {
            // Successful submission
            $_SESSION['success_message'] = "Changes have been successfully updated.";
            echo '<script>alert("Changes have been successfully updated!"); window.location.href = "products.php?ID=' . $productID . '";</script>';
            exit; // Exit to prevent further execution
        } else {
            // Error handling
            $_SESSION['error_message'] = "Error updating record: " . $con->error;
            echo '<script>alert("Error updating record: ' . $con->error . '"); window.location.href = "dashboard_edit.php";</script>';
            exit; // Exit to prevent further execution
        }
        $updateStmt->close();
    }

    // Cancel button function
    if (isset($_POST['cancel'])) {
        // Redirect to products.php using JavaScript
        echo '<script>window.location.href = "products.php?ID=' . $productID . '";</script>';
        exit;
    }
} else {
    // Redirect if no productID is set
    echo '<script>alert("No product ID provided."); window.location.href = "products.php";</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Products board</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style3.css">
  </head>
  <body>
  

    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
        <h2>PRODUCTS MENU</h2>
        </div>
        <div class="header-right">
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">shopping_cart</span> STORE
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
			<li class="sidebar-list-item">
            <a href="dashboard.php">
                <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
        	</li>
          </li>
          <li class="sidebar-list-item">
            <a href="products.php">
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">group</span> Admins
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">poll</span> Reports
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title"></div>
        <div class="table-data">
                <div class="dep">
                    <div class="head">
                        <h3>Edit Product</h3>
                        <i class='bx bx-filter'></i>
                    </div>
                    <div class="container">
                        <form action="" method="post">
                            <div class="form first">
                                <div class="details personal">
                                    <span class="title">Product Details</span>
                                    <div class="fields">
                                        <div class="input-field">
                                            <label>Product Name</label>
                                            <input type="text" placeholder="Enter product name" name="ProductName" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Category</label>
                                            <input type="text" placeholder="Enter Category" name="Category" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Shelf</label>
                                            <input type="text" placeholder="Enter shelf number" name="shelf" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Units </label>
                                            <input type="text" placeholder="Enter number of units" name="UnitsInStock" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="productID">
                                <button type="button" class="submit" onclick="window.location.href='products.php?ID=<?php echo $productID; ?>'">
                                <span class="btnText">Cancel</span>
                                <i class="uil uil-navigator"></i>
                                </button>
                                <button class="submit" type="submit" name="update">
                                   <span class="btnText">Update Product</span>
                                  <i class="uil uil-navigator"></i>
                              </button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

      </main>
      <!-- End Main -->
      
    </div>
    
    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>