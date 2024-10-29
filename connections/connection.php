<?php
function connection() {
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "cozyrack";

    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        return $con;
    }
}
?>