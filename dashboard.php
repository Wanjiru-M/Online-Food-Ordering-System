<?php
include('session_m.php');
// include('db_connection.php'); // Include your database connection file

// Example SQL queries to fetch data
$sqlTotalUsers = "SELECT COUNT(*) AS total_customer FROM customer";
$sqlTotalOrders = "SELECT COUNT(*) AS total_orders FROM orders";
$sqlTotalFood = "SELECT COUNT(*) AS total_food FROM food";
$sqlPendingOrders = "SELECT COUNT(*) AS pending_orders FROM orders WHERE order_status = 'Pending'";
$sqlCancelledOrders = "SELECT COUNT(*) AS cancelled_orders FROM orders WHERE order_status = 'Cancelled'";
$sqlDispatchedOrders = "SELECT COUNT(*) AS dispatched_orders FROM orders WHERE order_status = 'Dispatched'";
$sqlApprovedOrders = "SELECT COUNT(*) AS approved_orders FROM orders WHERE order_status = 'Approved'";
$sqlDeliveredOrders = "SELECT COUNT(*) AS delivered_orders FROM orders WHERE order_status = 'Delivered'";


// Execute SQL queries
$resultTotalUsers = mysqli_query($conn, $sqlTotalUsers);
if (!$resultTotalUsers) {
    die("Error fetching total customer: " . mysqli_error($conn));
}

$resultTotalOrders = mysqli_query($conn, $sqlTotalOrders);
if (!$resultTotalOrders) {
    die("Error fetching total orders: " . mysqli_error($conn));
}

$resultTotalFood = mysqli_query($conn, $sqlTotalFood);
if (!$resultTotalOrders) {
    die("Error fetching total food: " . mysqli_error($conn));
}

$resultPendingOrder = mysqli_query($conn, $sqlPendingOrders);
if (!$resultPendingOrder) {
    die("Error fetching pending orders: " . mysqli_error($conn));
}

$resultCancelledOrder = mysqli_query($conn, $sqlCancelledOrders);
if (!$resultCancelledOrder) {
    die("Error fetching canceled orders: " . mysqli_error($conn));
}

$resultDispatchedOrder = mysqli_query($conn, $sqlDispatchedOrders);
if (!$resultDispatchedOrder) {
    die("Error fetching dispatched orders: " . mysqli_error($conn));
}

$resultApprovedOrder = mysqli_query($conn, $sqlApprovedOrders);
if (!$resultApprovedOrder) {
    die("Error fetching approved orders: " . mysqli_error($conn));
}

$resultDeliveredOrder = mysqli_query($conn, $sqlDeliveredOrders);
if (!$resultApprovedOrder) {
    die("Error fetching delivered orders: " . mysqli_error($conn));
}
// Fetch data
$rowTotalUsers = mysqli_fetch_assoc($resultTotalUsers);
$rowTotalOrders = mysqli_fetch_assoc($resultTotalOrders);
$rowTotalFood = mysqli_fetch_assoc($resultTotalFood);
$rowPendingOrders = mysqli_fetch_assoc($resultPendingOrder);
$rowCancelledOrders = mysqli_fetch_assoc($resultCancelledOrder);
$rowDispatchedOrders = mysqli_fetch_assoc($resultDispatchedOrder);
$rowApprovedOrders = mysqli_fetch_assoc($resultApprovedOrder);
$rowDeliveredOrders = mysqli_fetch_assoc($resultDeliveredOrder);
// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="styles.css">
    
    <title>Admin Dashboard</title>
</head>
<body>
    <style>
/* styles.css */

/* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: "Bellota Text", sans-serif ;
    background-color: #f9f9f9;
}



/* Content styles */
.content-container {
    display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-left: 260px;
            margin-top: 70px;
}

.content-box {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    /* width: 850px;  */
     height: 200px; 
     display: flex;
     align-items: center;
    
}
.content-box i{
    margin-right: 10px;
}
.content-box:nth-child(1) i,
.content-box:nth-child(3) i,
.content-box:nth-child(6) i,
.content-box:nth-child(8) i {
    color: #E9B824;
   
}
 .content-box:nth-child(2) i,
.content-box:nth-child(4) i,
.content-box:nth-child(5) i,
.content-box:nth-child(7) i {
     color: #5C8374;
}
.content-box:nth-child(1) > .details-link > .fa-eye,
.content-box:nth-child(3) > .details-link > .fa-eye,
.content-box:nth-child(6) > .details-link > .fa-eye,
.content-box:nth-child(8) > .details-link > .fa-eye {
color: #82A0D8;
}
.content-box:nth-child(2) > .details-link > .fa-eye,
.content-box:nth-child(4) > .details-link > .fa-eye,
.content-box:nth-child(5) > .details-link > .fa-eye,
.content-box:nth-child(7) > .details-link > .fa-eye {
    color: #82A0D8;
}
h1 {
    font-size: 16px;
    margin-top: 30px;
    margin-bottom: 10px;
    margin-left: 10px;
    text-align: right;
    font-family: "Bellota Text", sans-serif;
}

h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

p {
    font-size: 20px;
    color: #555;
    margin-top: 20px;
    color: #333;
    font-weight: 600;
}

/* Additional styles for Total Users and Total Orders */
.total-section {
    display: inline-block;
    width: 250px; /* Adjust width as needed */
    margin-right: 20px; /* Adjust spacing between sections */
}
.summary{
    flex-grow: 1;
    text-align: right;
}
.details-link{
    margin-top: 30px;
    margin-left: -17px;
}
.details-link i{
    font-size: 16px;
}
a{
    text-decoration: none;
    color: #333;
    font-family: "Bellota Text", sans-serif;

}
h3{
    margin-left: 260px;
    margin-top: 50px;
    background-color: #CEDEBD;
    height: 50px;
    color: #000;
    padding: 10px;
}
</style>

<?php include('admin_panel.php'); ?>
<div style="height: 1000px; overflow-y: auto;">
<h3>Admin Dashboard</h3>
<div class="content-container">
<div class="content-box total-section">
    <i class="fas fa-box fa-2x"></i>
        <h1 class="products">Products</h1>
        <div class="summary">
  <?php if (isset($rowTotalFood['total_food'])): ?>
                <p><?php echo $rowTotalFood['total_food']; ?></p>
            <?php else: ?>
                <p>No food items available</p>
            <?php endif; ?>
        </div>
        <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
    </div>

    <div class="content-box total-section">
       <i class="fas fa-users fa-2x"></i>
        <h1>Total Users</h1>
        <div class="summary">
            <p><?php echo $rowTotalUsers['total_customer']; ?></p>
        </div>
         <div class="details-link">
        <i class="fas fa-eye"></i> <a href="users.php">View Details</a>
    </div>
    </div>
<div class="content-box total-section">
    <i class="fas fa-hourglass-half fa-2x"></i>
    <h1 >Pending Orders</h1>
    <div class="summary">
        <p><?php echo $rowPendingOrders['pending_orders']; ?></p>
    </div>
     <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
</div>

<div class="content-box total-section">
    <i class="fas fa-times-circle fa-2x"></i>
    <h1>Cancelled Orders</h1>
    <div class="summary">
        <p><?php echo $rowCancelledOrders['cancelled_orders']; ?></p>
    </div>
     <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
</div>

<div class="content-box total-section">
    <i class="fas fa-check-circle fa-2x"></i>
    <h1>Approved Orders</h1>
    <div class="summary">
        <p><?php echo $rowApprovedOrders['approved_orders']; ?></p>
    </div>
     <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
</div>
<div class="content-box total-section">
    <i class="fas fa-truck fa-2x"></i>
    <h1>Dispatched Orders</h1>
    <div class="summary">
        <p><?php echo $rowDispatchedOrders['dispatched_orders']; ?></p>
    </div>
     <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
</div>


<div class="content-box total-section">
    <i class="fas fa-check-double fa-2x"></i>
    <h1>Delivered Orders</h1>
    <div class="summary">
        <p><?php echo $rowDeliveredOrders['delivered_orders']; ?></p>
    </div>
     <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_food_items.php">View Details</a>
    </div>
</div>

    <div class="content-box total-section">
         <i class="fas fa-chart-bar fa-2x"></i>
        <h1>Total Orders</h1>
        <div class="summary">
            <p><?php echo $rowTotalOrders['total_orders']; ?></p>
        </div>
         <div class="details-link">
        <i class="fas fa-eye"></i> <a href="view_order_details.php">View Details</a>
    </div>
    </div>
</div>


        <!-- <p>Total Users: <?php echo $rowTotalUsers['total_customer']; ?></p> -->
        <!-- <p>Total Orders: <?php echo $rowTotalOrders['total_orders']; ?></p> -->
        <!-- Display more summary information here -->
    </div>
    <!-- Add more sections for statistics or additional data -->
</div>
</div>
</div>
            </div>
</body>
</html>
