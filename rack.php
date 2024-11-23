<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Racks Table</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left"></div>
        <div class="header-right"></div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">shopping_cart</span> COZY Rack
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>
        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="dashboard.php">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
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
            <a href="rack.php" target="_blank">
              <span class="material-icons-outlined">monitor_weight</span> Racks
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php" class="logout-link">
              <span class="material-icons-outlined">logout</span>
              <span class="nav-text">Logout</span>
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>
        <div class="main-cards">
          <div class="card">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1></h1>
          </div>
          <div class="card">
            <div class="card-inner">
              <h3>Rack 1</h3>
              <span class="material-icons-outlined">storage</span>
            </div>
            <h1>000</h1>
          </div>
        </div>
        <div class="table-data">
          <h2>Logs</h2>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Weight</th>
                <th>Status</th>
                <th>Date</th>
                <th>Time</th>
                <th>Item Count</th>
                <th>Timestamp</th>
              </tr>
            </thead>
            <tbody>
              <!-- Add dynamic table rows here -->
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
