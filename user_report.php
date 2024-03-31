<?php
include('session_m.php');
// Include your database connection file
// include('db_connection.php');

// Example SQL query to fetch user data and total orders
$sqlUserReport = "SELECT c.fullname, c.email, c.contact, c.reg_date, 
                    COUNT(o.order_ID) AS total_orders 
                  FROM customer c
                  LEFT JOIN orders o ON c.username = o.username
                  GROUP BY c.username";

// Execute SQL query
$resultUserReport = mysqli_query($conn, $sqlUserReport);
if (!$resultUserReport) {
    die("Error fetching user report: " . mysqli_error($conn));
}

// Fetch data
$userReports = array();
while ($row = mysqli_fetch_assoc($resultUserReport)) {
    $userReports[] = $row;
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
    <title>User Reports</title>
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
        margin-left: 830px;
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
    
    <div class="user-reports" style="height: 800px; overflow-y: auto;">
     
    <h4>User Reports  <!-- Add the download link/button -->
    <div style="text-align: center; margin-top: px;">
        <a href="download_report.php" class="btn-download">Download User Report</a>
                </div></h4>
    <table>
            <thead>
                 
                <tr>
                     <th>ID</th> 
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Registration Date</th>
                    <th>Total Orders</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
            $counter = 1; // Initialize the counter
            foreach ($userReports as $user): 
            ?>
                
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $user['fullname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php echo $user['reg_date']; ?></td>
                        <td><?php echo $user['total_orders']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
