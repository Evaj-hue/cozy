<?php
// Database connection
include_once("connections/connection.php");
$mysqli = connection();

// Handle Search
$search = '';
if (isset($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM rack_product WHERE ProductName LIKE '%$search%' ORDER BY productID DESC";
} else {
    $sql = "SELECT * FROM rack_product ORDER BY productID DESC";
}
$result = $mysqli->query($sql);

if (!$result) {
    echo "Error fetching data: " . $mysqli->error;
    error_log("Database query error: " . $mysqli->error);
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    
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
            <a href="admin.php">
              <span class="material-icons-outlined">group</span> Admins
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php">
              <span class="material-icons-outlined">monitor_weight</span> Racks
            </a>
          </li>
          <li class ="sidebar-list-item">
          <a href="logout.php" class="logout-link">
            <span class="material-icons-outlined">logout</span>
            <span class="nav-text">Logout</span>
          </a>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
        </div>
        <div class="main-cards">
         <div class="card">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1>4</h1>
         </div>
        </div>
        <!-- table things -->
        <div class="table-data"> 
        <div class="dep">
           <div class="head">
             <h3>Product List</h3>
        <!-- Add your buttons and forms here -->
             <form method="POST" action="downloadrecords.php" style="display:inline;">
                   <input type="hidden" name="search" value="<?php echo htmlspecialchars($search); ?>">
                     <button type="submit" name="btnDownload" class="button">
                      <span class="bxs-text">Download</span>
                       </button>   
                        </form>
               <form action="dashboard_add.php" style="display:inline;">
                     <button class="button">
                   <i class='bx bx-plus'></i>
                  <span class="bxs-text">Add Product</span>
                 </button>
             </form>
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get" style="display:inline;">
                  <button type="submit" name="viewAll" class="button">
                    <span class="bxs-text">View All</span>
                  </button>    
            </form>
            <div class="user-info">
                    <div class="search-box">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                            <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
          <table>  
          <thead>
              <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Category</th>
         <th>Shelf</th>
          <th>Stock</th>  


         <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php 
           while ($row = $result->fetch_assoc()) {
       ?>
        <tr>
              <td><?php echo htmlspecialchars($row['productID']); ?></td>
             <td><?php echo htmlspecialchars($row['ProductName']); ?></td>
              <td><?php echo htmlspecialchars($row['Category']); ?></td>
              <td><?php echo htmlspecialchars($row['shelf']); ?></td>
              <td><?php echo htmlspecialchars($row['UnitsInStock']); ?></td>
              <td class="button_form">
     <a href="dashboard_edit.php?ID=<?php echo htmlspecialchars($row['productID']); ?>" class="button_edit">
      <i class='bx bx-edit'></i>
         </a>
    <form action="dashboard_delete.php" method="get" style="display:inline;">
      <input type="hidden" name="ID" value="<?php echo htmlspecialchars($row['productID']); ?>">
      <button class="button_delete" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">
        <i class='bx bxs-trash'></i>
            </form>
              </td>
               </tr>
     <?php 
     } 
      ?>
        </tbody>

        </table>
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