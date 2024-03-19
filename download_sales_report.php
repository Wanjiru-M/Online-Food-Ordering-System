<?php
// Include your database connection file
include('session_m.php');

// Example SQL query to fetch sales report
$sqlSalesReport = "SELECT YEAR(order_date) AS year,
                        MONTH(order_date) AS month,
                        DAY(order_date) AS day,
                        SUM(price * quantity) AS total_sales,
                        foodname AS top_product,
                        
                        payment_method
                  FROM orders
                  GROUP BY YEAR(order_date), MONTH(order_date), DAY(order_date), F_ID
                  ORDER BY year DESC, month DESC, day DESC, total_sales DESC";

// Execute SQL query
$resultSalesReport = mysqli_query($conn, $sqlSalesReport);
if (!$resultSalesReport) {
    die("Error fetching sales report: " . mysqli_error($conn));
}

// Initialize CSV data
$csvData = "Year,Month,Day,Total Sales,Top Product,Payment Method\n";

// Fetch data and format as CSV
while ($row = mysqli_fetch_assoc($resultSalesReport)) {
    $csvData .= "{$row['year']},{$row['month']},{$row['day']},{$row['total_sales']},{$row['top_product']},{$row['payment_method']}\n";
}

// Close database connection
mysqli_close($conn);

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="sales_report.csv"');

// Output the CSV data
echo $csvData;
?>
