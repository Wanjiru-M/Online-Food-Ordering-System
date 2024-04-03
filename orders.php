<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
	<style>
		table {
			width: 80%;
			border-collapse: collapse;
			margin-left: auto;
			margin-right: auto;
		}
		
		th, td {
			padding: 17px !important;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		
		th {
			background-color: #4CAF50;
			color: white;
		}
		
		tr:hover {background-color: #f5f5f5;}
		
		.foodlist {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin-top: 20px;
			margin-left: 1100px;
			margin-right: auto;
            margin-bottom: 60px;
		}
    .footer{
      background-color: #333 !important;
      color: #fff !important;
    }
        h1 { text-align: center; color: #4CAF50; font-size: 36px; margin-bottom: 30px; }
	</style>
</head>

  <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
  
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

  
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
          <a class="navbar-brand" href="index.php">Between Two Buns'</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="orders.php"><span class="glyphicon glyphicon-log-out"></span> My Orders </a></li>
            

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu</a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) 
			  </a></li>
              <li><a href="orders.php"><span class="glyphicon glyphicon-log-out"></span> My Orders </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>
<!--
<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
               <li> <a href="managersignup.php"> Manager Sign-up</a></li> 
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>
-->
<?php
}
?>


        </div>

      </div>
    </nav>
<body>


          <h1>My Orders</h1>
<?php



// Check if user is logged in
if (!isset($_SESSION["login_user2"])) {
    // Redirect to login page if not logged in
    header("location: customerlogin.php");
    exit();
}

// Include database connection
require 'connection.php';
$conn = Connect();

// Retrieve the user's past orders from the database
$username = $_SESSION["login_user2"];
$query = "SELECT * FROM orders WHERE username = '$username' ORDER BY order_date DESC";
$result = $conn->query($query);

// Display the orders in a table
echo "<table border='1'>
<tr>
<th>Order Date</th>
<th>Order Items</th>
<th>Order Total</th>
<th>Order Status</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["order_date"] . "</td>";
    echo "<td>" . $row["foodname"] . " - " . $row["price"] . " x " . $row["quantity"] . "</td>";
    echo "<td>" . $row["price"] * $row["quantity"] . "</td>";
    // echo "<td>" . $row["order_status"] . "</td>";
     echo "<td>" . ucfirst(strtolower($row["order_status"])) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close database connection
$conn->close();

?>

<br>
<a class="foodlist" href="foodlist.php">Back to Menu</a>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <h3>Contact Us</h3>
                <p>Email: betweentwobuns@gmail.com</p>
                <p>Phone: +25412345678</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Follow Us</h3>
                <p>Stay updated with our latest news and offers:</p>
                <ul class="social-icons" style="list-style-type: none; padding: 0;">
                    <li style="display: inline-block; margin-right: 10px;"><a href="www.facebook.com" style="color: #fff;"><i class="fab fa-facebook"></i></a></li>
                    <li style="display: inline-block; margin-right: 10px;"><a href="www.twitter.com" style="color: #fff;"><i class="fab fa-twitter"></i></a></li>
                    <li style="display: inline-block;"><a href="www.instagram.com" style="color: #fff;"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <h3>Quick Links</h3>
                <ul class="quick-links" style="list-style-type: none; padding: 0;">
                    <li><a href="index.php" style="color: #fff; text-decoration: none;">Home</a></li>
                    <li><a href="foodlist.php" style="color: #fff; text-decoration: none;">Menu</a></li>
                    <li><a href="aboutus.php" style="color: #fff; text-decoration: none;">About Us</a></li>
                    <li><a href="contactus.php" style="color: #fff; text-decoration: none;">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12 text-center">
                <p style="margin: 0;">Copyright &copy; 2024. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>