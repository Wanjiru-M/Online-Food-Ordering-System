<?php
// Include your database connection file
include('session_m.php');

//  SQL query to fetch user data and total orders
$sqlUserReport = "SELECT c.fullname, c.email, c.contact, c.reg_date, 
                    COUNT(o.order_ID) AS total_orders 
                  FROM customer c
                  LEFT JOIN orders o ON c.username = o.customer_username
                  GROUP BY c.username";

// Execute SQL query
$resultUserReport = mysqli_query($conn, $sqlUserReport);
if (!$resultUserReport) {
    die("Error fetching user report: " . mysqli_error($conn));
}

// Initialize CSV data
$csvData = "Full Name,Email,Contact,Registration Date,Total Orders\n";

// Fetch data and format as CSV
while ($row = mysqli_fetch_assoc($resultUserReport)) {
    $csvData .= "{$row['fullname']},{$row['email']},{$row['contact']},{$row['reg_date']},{$row['total_orders']}\n";
}

// Close database connection
mysqli_close($conn);

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="user_report.csv"');

// Output the CSV data
echo $csvData;
?>
