<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    <style>
        /* CSS styling for sidebar and dropdown menu */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            z-index: 1;
            overflow: hidden;
            overflow-y: auto;
        }
        
        .sidebar h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 2px;
        }
        
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar ul li {
            padding: 10px;
        }
        
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        
        .sidebar ul li a:hover {
            background-color: #555;
        }
        
        .dropdown-content {
            display: none;
            background-color: #333;
            min-width: 160px;
            position: absolute;
            z-index: 2;
        }
        
        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background-color: #555;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="view_food_items.php">View Food Items</a></li>
                       <li><a href="add_food_items.php">Add Food Items</a></li>
            <li><a href="edit_food_items.php">Edit Food Items</a></li>
            <li><a href="delete_food_items.php">Delete Food Items</a></li>
                        <li><a href="view_order_details.php">View Order Details</a></li>
                        <li><a href="users.php">Users</a></li>
                        <!-- <li><a href="users.php">Users</a></li>
                     -->
            <li class="dropdown">
                <a href="#">Reports</a>
                <div class="dropdown-content">
                    <a href="sales_report.php">Sales Report</a>
                    <a href="user_report.php">User Report</a>
                    <a href="dishes_report.php">Dishes Report</a>
                    <a href="items_in_stock.php">Food Items in Stock</a>
                           <a href="orders_count_report.php">Orders Count Report</a>
                           <a href="profit_loss_report.php">Profit & Loss Report</a>
                    
                </div>
            </li>
        </ul>
    </div>
    <div class="content">
        <!-- Content for each section will go here -->
        <?php
        // Example content for the "My Restaurant" section
        // $restaurantName = "My Awesome Restaurant";
        // echo "<h1>$restaurantName</h1>";
        // Other HTML content...
        ?>
    </div>
</body>
</html>

