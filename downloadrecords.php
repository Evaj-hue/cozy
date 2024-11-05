<?php 
include_once("connections/connection.php"); // Ensure this includes and initializes $con
$conn = connection(); // Initialize $con

//Handle download
if(isset($_POST['btnDownload'])){
    //retrieve search criteria if exists
    $search = "";
    if(isset($_POST['search'])){
        $search = $conn->real_escape_string($_POST['search']);
    }
    //set filetype
    header('Content-type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=download.csv');

    //set to write to the file 
    $output = fopen('php://output','w');

    //set to write the data per field per record to each row in the CSV file strating on the second row 
    $query= "SELECT * FROM rack_product";
    if(!empty($search)){
        $query .= "WHERE productName '%$search%'";
    }
    $query .= "ORDER BY productID ASC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            //adjust the order of fields as per your table structure
            fputcsv($output, array(
                $row['productID'],
                $row['ProductName'],
                $row['Category'],
                $row['shelf'],
                $row['UnitsInStock']
            ));
        }
        fclose($output);
    }
}
?>