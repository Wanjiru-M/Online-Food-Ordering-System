<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Between Two Buns</title>
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/foodlist.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style>
        /* Your additional CSS styles here */
    </style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="glyphicon glyphicon-chevron-up"></span>
</button>

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

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="orders.php"><span class="glyphicon glyphicon-log-out"></span> My Orders </a></li>
                <!-- PHP code for dynamic navigation based on user session -->
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
                <!-- Add login/signup links here if needed -->
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
