<?php
include('session_m.php');


// Initialize variables with empty values
$filterOption = '';
$start_date = '';
$end_date = '';
$selected_year = '';
$salesReports = array();

// Check if the form is submitted and the filter option is set
if (isset($_POST['filterOption'])) {
    $filterOption = $_POST['filterOption'];
    if ($filterOption == 'date_range') {
        // If filter option is date range, construct SQL query for the specified date range
        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $sqlSalesReport = "SELECT order_date, 
                                    YEAR(order_date) AS year,
                                    MONTH(order_date) AS month,
                                    DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date_formatted,
                                    SUM(price * quantity) AS total_sales,
                                    foodname AS top_product,
                                    COUNT(*) AS order_count,
                                    payment_method
                              FROM orders
                              WHERE order_date BETWEEN '$start_date' AND '$end_date'
                              GROUP BY YEAR(order_date), MONTH(order_date), F_ID
                              ORDER BY year DESC, month DESC, total_sales DESC";
        }
    } elseif ($filterOption == 'year') {
        // If filter option is year, construct SQL query for the specified year
        if (isset($_POST['selected_year'])) {
            $selected_year = $_POST['selected_year'];
            $sqlSalesReport = "SELECT order_date, 
                                    YEAR(order_date) AS year,
                                    MONTH(order_date) AS month,
                                    DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date_formatted,
                                    SUM(price * quantity) AS total_sales,
                                    foodname AS top_product,
                                    COUNT(*) AS order_count,
                                    payment_method
                              FROM orders
                              WHERE YEAR(order_date) = '$selected_year'
                              GROUP BY YEAR(order_date), MONTH(order_date), F_ID
                              ORDER BY year DESC, month DESC, total_sales DESC";
        }
    }
}

// Execute SQL query if it's set
if (isset($sqlSalesReport)) {
    $resultSalesReport = mysqli_query($conn, $sqlSalesReport);
    if (!$resultSalesReport) {
        die("Error fetching sales report: " . mysqli_error($conn));
    }

// Execute SQL query if it's set
if (isset($sqlSalesReport)) {
  $resultSalesReport = mysqli_query($conn, $sqlSalesReport);
  if (!$resultSalesReport) {
    die("Error fetching sales report: " . mysqli_error($conn));
  }

  // Check if there are any results
  $num_rows = mysqli_num_rows($resultSalesReport);

  // Fetch data if there are results
  if ($num_rows > 0) {
    while ($row = mysqli_fetch_assoc($resultSalesReport)) {
      $salesReports[] = $row;
    }
  } 
}
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
    <title>Sales Report</title>
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
        margin-left: 835px;
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
<h4>Sales Report  <!-- Add the download link/button -->
    <div style="text-align: center; margin-top: px;">
        <a href="download_sales_report.php" class="btn-download">Download Sales Report</a>
                </div></h4>
        <form method="post">
            <label><input type="radio" name="filterOption" value="date_range" <?php echo ($filterOption === 'date_range') ? 'checked' : ''; ?>> Date Range</label>
            <label><input type="radio" name="filterOption" value="year" <?php echo ($filterOption === 'year') ? 'checked' : ''; ?>> Year</label><br>

            <?php if ($filterOption === 'date_range'): ?>
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>">

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
            <?php elseif ($filterOption === 'year'): ?>
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
            <?php endif; ?>

            <button type="submit">Filter</button>
        </form>
    
        <table>
            <thead>
                <tr>
                
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Top Product</th>
                    <th>Total Sales</th>
                    <!-- <th>Payment Method</th> -->
                </tr>
            </thead>
            <tbody>
                 <?php if (empty($salesReports)): ?>
        <tr>
            <td colspan="5">No sales reports available for the selected period.</td>
        </tr>
    <?php else: ?>
                 <?php 
            $counter = 1; // Initialize the counter
            foreach ($salesReports as $sale): 
            ?>
                
                    <tr>
                        
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $sale['order_date_formatted']; ?></td>
                        
                        
                        <td><?php echo $sale['top_product']; ?></td>
                        <td><?php echo $sale['total_sales']; ?></td>
                     
                        <!-- <td><?php echo $sale['payment_method']; ?></td> -->
                    </tr>
                <?php endforeach; ?>
                 <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
