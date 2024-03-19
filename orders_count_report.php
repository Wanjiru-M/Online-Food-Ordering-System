<?php
// Include your database connection file
include('session_m.php');

// Initialize variables
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$selected_year = isset($_POST['selected_year']) ? $_POST['selected_year'] : '';

// Define SQL queries to fetch orders count for different statuses
$sqlQueries = [
    "SELECT COUNT(*) AS pending_orders FROM orders WHERE order_status = 'pending'",
    "SELECT COUNT(*) AS approved_orders FROM orders WHERE order_status = 'approved'",
    "SELECT COUNT(*) AS dispatched_orders FROM orders WHERE order_status = 'dispatched'",
    "SELECT COUNT(*) AS cancelled_orders FROM orders WHERE order_status = 'cancelled'",
    "SELECT COUNT(*) AS delivered_orders FROM orders WHERE order_status = 'delivered'"
];

// Apply date range filter if provided
if (!empty($start_date) && !empty($end_date)) {
    foreach ($sqlQueries as &$sqlQuery) {
        $sqlQuery = str_replace("WHERE", "WHERE order_date BETWEEN '$start_date' AND '$end_date' AND", $sqlQuery);
    }
}

// Apply year filter if provided
if (!empty($selected_year)) {
    foreach ($sqlQueries as &$sqlQuery) {
        $sqlQuery = str_replace("WHERE", "WHERE YEAR(order_date) = '$selected_year' AND", $sqlQuery);
    }
}

// Execute SQL queries
$orderCounts = [];
foreach ($sqlQueries as $sqlQuery) {
    $result = mysqli_query($conn, $sqlQuery);
    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $orderCounts[] = $row;
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Orders Count Report</title>
   <style>
        body{
            font-family: "Bellota Text", sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: 260px;
            z-index:1;
        }
        th, td {
            padding: 25px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #CEDEBD;
        }
        h4{
            margin-left: 260px;
            background-color: #183D3D;
            height: 50px;
            color:#fff;
            padding: 10px;
        }
        
                 .btn-download {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        /* font-size: 16px; */
        transition: background-color 0.3s;
        margin-left: 787px;
        margin-top: -10px;
    }

    .btn-download:hover {
        background-color: #45a049;
    }
    form{
        margin-left: 270px;
        margin-bottom: 20px;
    }    
    label{
        margin-top:50px;
    }
        
    </style>
</head>
<body>
     <?php
include('admin_panel.php');
?>
    
    <div class="dishes-reports" style="height: 800px; overflow-y: auto;">
     
    <h4>Orders Count Report <!-- Add the download link/button -->
    <div style="text-align: center; margin-top: px;">
        <a href="download_orders_count_report.php" class="btn-download">Download Orders Count Report</a>
                </div></h4>
    
 
    <form method="post">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
        <label for="selected_year">Select Year:</label>
        <select id="selected_year" name="selected_year">
            <?php
            // Generate options for selecting year
            $current_year = date('Y');
            for ($year = $current_year; $year >= 2010; $year--) {
                echo "<option value=\"$year\" " . (($selected_year == $year) ? 'selected' : '') . ">$year</option>";
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Total Orders Pending</th>
            <th>Total Approved Orders</th>
            <th>Total Dispatched Orders</th>
            <th>Total Cancelled Orders</th>
            <th>Total Delivered Orders</th>
        </tr>
        <tr>
    <td>1</td>
    <td><?php echo isset($orderCounts[0]['pending_orders']) ? $orderCounts[0]['pending_orders'] : 0; ?></td>
    <td><?php echo isset($orderCounts[1]['approved_orders']) ? $orderCounts[1]['approved_orders'] : 0; ?></td>
    <td><?php echo isset($orderCounts[2]['dispatched_orders']) ? $orderCounts[2]['dispatched_orders'] : 0; ?></td>
    <td><?php echo isset($orderCounts[3]['cancelled_orders']) ? $orderCounts[3]['cancelled_orders'] : 0; ?></td>
    <td><?php echo isset($orderCounts[4]['delivered_orders']) ? $orderCounts[4]['delivered_orders'] : 0; ?></td>
</tr>

        </tr>
    </table>
</body>
</html>
