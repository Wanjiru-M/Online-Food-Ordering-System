<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); 
// Validate and sanitize order ID and status
$order_id = filter_input(INPUT_POST, 'order_id', FILTER_SANITIZE_NUMBER_INT);
$new_status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if ($order_id && $new_status) { // Basic validation check
  $sql = "UPDATE orders SET order_status = ? WHERE order_ID = ?";
  $stmt = $conn->prepare($sql); // Prepare statement for security
  $stmt->bind_param('si', $new_status, $order_id);

  if ($stmt->execute()) {
    $update_successful = true; // Flag for successful update
  } else {
    echo "Error updating order status: " . $conn->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid data provided.";
}

// Redirect if update was successful
if ($update_successful) {
  header("Location: view_order_details.php?order_id=" . $order_id); // Redirect with order ID
  exit; // Stop further script execution
}
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title> Manager Login | Between Two Buns </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/view_order_details.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>
           <style>
        body{
            font-family: "Bellota Text", sans-serif;
        }
        table {
            max-width: 100%;
            border-collapse: collapse;
            margin-left: 10px;
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
    </style>
<?php
include('admin_panel.php');
?>
  
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Between Two Buns</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <!-- <h1>Hello Manager! </h1> -->
     <!-- <p>Manage your restaurant from here</p> -->

    </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    		<!-- <a href="myrestaurant.php" class="list-group-item ">My Restaurant</a> -->
    		<!-- <a href="view_food_items.php" class="list-group-item">View Food Items</a> -->
    		<!-- <a href="add_food_items.php" class="list-group-item ">Add Food Items</a> -->
    		<!-- <a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a> -->
    		<!-- <a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a> -->
        <!-- <a href="view_order_details.php" class="list-group-item active">View Order Details</a> -->
    	</div>
    </div>
    


    
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> YOUR FOOD ORDER LIST </h3>


<?php




// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM orders o WHERE o.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY order_date";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>  </th>
        <th> Order ID </th>
        <th> Food ID </th>
        <th> Order Date </th>
        <th> Food Name </th>
        <th> Price </th>
        <th> Quantity </th>
        <th> Customer </th>
        <th>Status</tr>
      </tr>
    </thead>

    
     <?php while($row = mysqli_fetch_assoc($result)){

  // Retrieve the updated order status from the database
  $order_status = $row['order_status'];

  // Output data of each row
  echo "<tbody>";
  echo "<tr>";
  echo "<td> <span class='glyphicon glyphicon-menu-right'></span> </td>";
  echo "<td>" . $row["order_ID"] . "</td>";
  echo "<td>" . $row["F_ID"] . "</td>";
  echo "<td>" . $row["order_date"] . "</td>";
  echo "<td>" . $row["foodname"] . "</td>";
  echo "<td>" . $row["price"] . "</td>";
  echo "<td>" . $row["quantity"] . "</td>";
  echo "<td>" . $row["username"] . "</td>";
  echo "<td>";
  echo "<form action='update_order_status.php' method='post'>";
  echo "<input type='hidden' name='order_id' value='" . $row['order_ID'] . "'>";
  echo "<select name='status'>";
  echo "<option value='pending' " . ($order_status == 'pending' ? 'selected' : '') . ">Pending</option>";
  echo "<option value='approved' " . ($order_status == 'approved' ? 'selected' : '') . ">Approved</option>";
  echo "<option value='cancelled' " . ($order_status == 'cancelled' ? 'selected' : '') . ">Cancelled</option>";
  echo "<option value='dispatched' " . ($order_status == 'dispatched' ? 'selected' : '') . ">Dispatched</option>";
  echo "<option value='delivered' " . ($order_status == 'delivered' ? 'selected' : '') . ">Delivered</option>";
  echo "</select>";
  echo "<br>";
  echo "<div class='update'>";
  echo "<input type='submit' name='update' value='Update'>";
  echo "</div>";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
  echo "</tbody>";

} 
?>
      </td>
    </tr>
    </tr>

  </tbody>
</form>
  <?php } ?>
  </table>
    <br>


  <?php{ ?>

  <!-- <h4><center>0 RESULTS</center> </h4> -->

  <?php ?>

        </form>

        
        </div>
      
    </div>
</div>
<br>
<br>
<br>
<br>
  
  </body>
</html>