<?php
// Include your database connection file
include('session_m.php');

// Example SQL query to fetch profit and loss report data
$sqlProfitLossReport = "SELECT YEAR(o.order_date) AS year,
                                MONTH(o.order_date) AS month,
                                DAY(o.order_date) AS day,
                                SUM(o.price * o.quantity) AS revenue,
                                SUM(f.cost_price * o.quantity) AS cogs,
                                SUM(e.amount) AS expenses
                        FROM orders o
                        INNER JOIN food f ON o.F_ID = f.F_ID
                        LEFT JOIN expenses e ON o.order_date = e.date
                        GROUP BY YEAR(o.order_date), MONTH(o.order_date), DAY(o.order_date)
                        ORDER BY year DESC, month DESC, day DESC";

// Execute SQL query
$resultProfitLossReport = mysqli_query($conn, $sqlProfitLossReport);
if (!$resultProfitLossReport) {
    die("Error fetching profit and loss report: " . mysqli_error($conn));
}

// Initialize CSV data
$csvData = "Year,Month,Day,Revenue,COGS,Expenses,Profit/Loss\n";

// Fetch data and format as CSV
while ($row = mysqli_fetch_assoc($resultProfitLossReport)) {
    $profitLoss = $row['revenue'] - ($row['cogs'] + $row['expenses']);
    $csvData .= "{$row['year']},{$row['month']},{$row['day']},{$row['revenue']},{$row['cogs']},{$row['expenses']},{$profitLoss}\n";
}

// Close database connection
mysqli_close($conn);

// Set headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="profit_loss_report.csv"');

// Output the CSV data
echo $csvData;
?>

