<?php
// Include your database connection file
include('session_m.php');

// Example SQL query to fetch dishes report
$sqlDishesReport = "SELECT F_ID, foodname, COUNT(*) AS ordered_count
                    FROM orders
                    GROUP BY F_ID, foodname
                    ORDER BY ordered_count DESC";

// Execute SQL query
$resultDishesReport = mysqli_query($conn, $sqlDishesReport);
if (!$resultDishesReport) {
    die("Error fetching dishes report: " . mysqli_error($conn));
}

// Initialize CSV data
$csvData = "Dish ID,Dish Name,Ordered Count\n";

// Fetch data and format as CSV
while ($row = mysqli_fetch_assoc($resultDishesReport)) {
    $csvData .= "{$row['F_ID']},{$row['foodname']},{$row['ordered_count']}\n";
}

// Close database connection
mysqli_close($conn);

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dishes_report.csv"');

// Output the CSV data
echo $csvData;
?>
