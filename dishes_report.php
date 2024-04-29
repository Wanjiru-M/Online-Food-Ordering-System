<?php
include('session_m.php');
// Include your database connection file
// include('db_connection.php');

// Example SQL query to fetch dish report
$sqlDishReport = "SELECT F_ID, foodname, COUNT(*) AS ordered_count
                  FROM orders
                  GROUP BY F_ID";

// Execute SQL query
$resultDishReport = mysqli_query($conn, $sqlDishReport);
if (!$resultDishReport) {
    die("Error fetching dish report: " . mysqli_error($conn));
}

// Fetch data
$dishReports = array();
while ($row = mysqli_fetch_assoc($resultDishReport)) {
    $dishReports[] = $row;
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
    <title>Dishes Report</title>
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
        margin-left: 820px;
        margin-top: -10px;
    }

    .btn-download:hover {
        background-color: #45a049;
    }

        
    </style>
</head>
<body>
      <?php
include('admin_panel.php');
?>
    
    <div class="dishes-reports" style="height: 800px; overflow-y: auto;">
     
    <h4>Dishes Report  <!-- Add the download link/button -->
    <div style="text-align: center; margin-top: px;">
        <a href="download_dishes_report.php" class="btn-download">Download Dishes Report</a>
                </div></h4>
    
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dish Name</th>
                    <th>Ordered Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dishReports as $dish): ?>
                    <tr>
                        <td><?php echo $dish['F_ID']; ?></td>
                        <td><?php echo $dish['foodname']; ?></td>
                        <td><?php echo $dish['ordered_count']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
