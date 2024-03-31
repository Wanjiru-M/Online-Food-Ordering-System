<!DOCTYPE html>
<html>
<head>
      <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Profit and Loss Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .container {
            font-family: "Bellota Text", sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .result {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .result p {
            margin: 10px 0;
            color: #555;
        }

        .result strong {
            color: #333;
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
        margin-left: 1050px;
        /* margin-top: -9000px */
    }

    .btn-download:hover {
        background-color: #45a049;
    }
 h4{
            margin-left: 260px;
            background-color: #183D3D;
            height: 50px;
            color:#fff;
            padding: 10px;
        }
    
    
    </style>
</head>
<body>
    <h4>Profit and Loss Report</h4>
 <div style="text-align: center; margin-top: -80px;">
        <a href="download_profit_loss_report.php" class="btn-download">Download Profit & Loss Report</a>
                </div></h4>
    
    <div class="container">
        <h1>Profit and Loss Report</h1>

        <!-- Form for filtering -->
    <form method="post">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date">
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year" min="1900" max="2100">
    <input type="submit" value="Apply Filter">
</form>


        <div class="result">
            <canvas id="profitLossChart" width="400" height="200"></canvas>

            <?php
            // Include database connection
            include('session_m.php');

            // Initialize variables
            $revenue = 0;
            $cogs = 0;
            $expenses = 0;
            $profitLoss = 0;

            // Get filter values
            $startDate = isset($_POST['start_date']) ? $_POST['start_date'] : null;
            $endDate = isset($_POST['end_date']) ? $_POST['end_date'] : null;
            $year = isset($_POST['year']) ? $_POST['year'] : null;

            // Construct SQL query for revenue with filters
            $sqlRevenue = "SELECT SUM(price * quantity) AS revenue FROM orders WHERE 1=1";
            if ($startDate) {
                $sqlRevenue .= " AND order_date >= '$startDate'";
            }
            if ($endDate) {
                $sqlRevenue .= " AND order_date <= '$endDate'";
            }
            if ($year) {
                $sqlRevenue .= " AND YEAR(order_date) = $year";
            }

            // Execute SQL query for revenue
            $resultRevenue = mysqli_query($conn, $sqlRevenue);
            if ($resultRevenue) {
                $rowRevenue = mysqli_fetch_assoc($resultRevenue);
                $revenue = $rowRevenue['revenue'];
            } else {
                echo "Error calculating revenue: " . mysqli_error($conn);
            }

            // Calculate COGS with filters
            $sqlCOGS = "SELECT SUM(f.cost_price * o.quantity) AS cogs 
                        FROM orders o
                        INNER JOIN food f ON o.F_ID = f.F_ID WHERE 1=1";
            if ($startDate) {
                $sqlCOGS .= " AND o.order_date >= '$startDate'";
            }
            if ($endDate) {
                $sqlCOGS .= " AND o.order_date <= '$endDate'";
            }
            if ($year) {
                $sqlCOGS .= " AND YEAR(o.order_date) = $year";
            }

            // Execute SQL query for COGS
            $resultCOGS = mysqli_query($conn, $sqlCOGS);
            if ($resultCOGS) {
                $rowCOGS = mysqli_fetch_assoc($resultCOGS);
                $cogs = $rowCOGS['cogs'];
            } else {
                echo "Error calculating COGS: " . mysqli_error($conn);
            }

            // Retrieve expenses with filters
            $sqlExpenses = "SELECT SUM(amount) AS total_expenses FROM expenses WHERE 1=1";
            if ($startDate) {
                $sqlExpenses .= " AND date >= '$startDate'";
            }
            if ($endDate) {
                $sqlExpenses .= " AND date <= '$endDate'";
            }
            if ($year) {
                $sqlExpenses .= " AND YEAR(date) = $year";
            }

            // Execute SQL query for expenses
            $resultExpenses = mysqli_query($conn, $sqlExpenses);
            if ($resultExpenses) {
                $rowExpenses = mysqli_fetch_assoc($resultExpenses);
                $expenses = $rowExpenses['total_expenses'];
            } else {
                echo "Error retrieving expenses: " . mysqli_error($conn);
            }

            // Calculate profit/loss
            $profitLoss = $revenue - ($cogs + $expenses);

            // Display results
            echo "<p><strong>Revenue:</strong> Ksh" . number_format($revenue, 0, '.', ',') . "</p>";
echo "<p><strong>Cost of Goods Sold (COGS):</strong> Ksh" . number_format($cogs, 0, '.', ',') . "</p>";
echo "<p><strong>Expenses:</strong> Ksh" . number_format($expenses, 0, '.', ',') . "</p>";
           echo "<p>" . ($profitLoss >= 0 ? "Profit" : "Loss") . ": Ksh" . number_format(abs($profitLoss), 0, '.', ',') . "</p>";

            // Close connection
            mysqli_close($conn);

            ?>
        </div>
    </div>

    <script>
    // Get the context of the canvas element
    var ctx = document.getElementById('profitLossChart').getContext('2d');

    // Data for the chart
    var data = {
        labels: ["Revenue", "COGS", "Expenses"],
        datasets: [{
            label: 'Amount (Ksh)',
            backgroundColor: ["green", "red", "blue"],
            data: [<?php echo $revenue; ?>, <?php echo $cogs; ?>, <?php echo $expenses; ?>]
        }]
    };

    // Configuration options
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Create the bar chart
    var chart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
    </script>
    <?php
include('admin_panel.php');
?> 
</body>
</html>
