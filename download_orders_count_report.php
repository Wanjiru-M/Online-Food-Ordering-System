<?php
// Include your database connection file
include('session_m.php');

// Example SQL query to fetch orders count report
$sqlOrdersCountReport = "SELECT 
                            COUNT(CASE WHEN order_status = 'pending' THEN 1 END) AS pending_orders,
                            COUNT(CASE WHEN order_status = 'confirmed' THEN 1 END) AS confirmed_orders,
                            COUNT(CASE WHEN order_status = 'dispatched' THEN 1 END) AS dispatched_orders,
                            COUNT(CASE WHEN order_status = 'cancelled' THEN 1 END) AS cancelled_orders,
                            COUNT(CASE WHEN order_status = 'delivered' THEN 1 END) AS delivered_orders
                        FROM orders";

// Execute SQL query
$resultOrdersCountReport = mysqli_query($conn, $sqlOrdersCountReport);
if (!$resultOrdersCountReport) {
    die("Error executing query: " . mysqli_error($conn));
}

// Fetch data
$orderCounts = mysqli_fetch_assoc($resultOrdersCountReport);

// Close database connection
mysqli_close($conn);

// Initialize CSV data
$csvData = "Order Status,Count\n";
$csvData .= "Pending," . $orderCounts['pending_orders'] . "\n";
$csvData .= "Confirmed," . $orderCounts['confirmed_orders'] . "\n";
$csvData .= "Dispatched," . $orderCounts['dispatched_orders'] . "\n";
$csvData .= "Cancelled," . $orderCounts['cancelled_orders'] . "\n";
$csvData .= "Delivered," . $orderCounts['delivered_orders'] . "\n";

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="orders_count_report.csv"');

// Output the CSV data
echo $csvData;
?>
