
<?php
// Include your database connection file
include('session_m.php');

// Example SQL query to fetch products in stock report
$sqlProductsInStock = "SELECT name, quantity
                       FROM food
                       ORDER BY name";

// Execute SQL query
$resultProductsInStock = mysqli_query($conn, $sqlProductsInStock);
if (!$resultProductsInStock) {
    die("Error fetching products in stock report: " . mysqli_error($conn));
}

// Initialize CSV data
$csvData = "Product Name,Quantity in Stock\n";

// Fetch data and format as CSV
while ($row = mysqli_fetch_assoc($resultProductsInStock)) {
    $csvData .= "{$row['name']},{$row['quantity']}\n";
}

// Close database connection
mysqli_close($conn);

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="products_in_stock.csv"');

// Output the CSV data
echo $csvData;
?>



