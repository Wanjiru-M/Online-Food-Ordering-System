<?php
session_start();
?>

<html>

  <head>
    <title> About | Between Two Buns </title>
  </head>
  <style>
    body{
      background-color: #ADBC9F !important;
    }
    p{
      
    }
    .container{
      font-size: 16px;
    }
    .wide {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2px;
  margin-top: -100px;
}
 h5{
  text-align: center;
  font-size: 30px !important;
  margin-top: 10px !important;
  color: #333 !important;
  font-family:'Outfit', sans-serif !important;  
  
}
.colored-line {
  border-top: 2px solid #ff0000; /* Adjust the color and size as needed */
  width: 70px; /* Adjust the width of the line */
  margin-top: 10px; /* Adjust the margin as needed */
  margin-bottom: 10px; /* Adjust the margin as needed */
}

.about-content{
  font-size: 20px !important;
}
.about-heading{
  
}
.content {
  width: 50%; /* Adjust this value as needed */
  margin-left: 50px;
}


.video {
  width: 40%; /* Adjust this value as needed */
}

.video iframe {
  width: 100%;
  height: 50%;
}
.mission-vision {
  margin-top: -100px; /* Adjust this value as needed */
}

.mission-vision h3 {
  font-size: 24px;
  margin-bottom: 10px;
  text-align: center;
}

.mission-vision p {
  font-size: 16px;
  line-height: 1.5;
}
.footer{
        background-color: #333;
        color: #fff !important;
      }

</style>
  <link rel="stylesheet" type = "text/css" href ="css/aboutus.css">
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
          <!-- <a class="navbar-brand" href="index.php">Le Cafe'</a> -->
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

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
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
            (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
            </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <!-- <li> <a href="managersignup.php"> Manager Sign-up</a></li> -->
          
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <!-- <li> <a href="managerlogin.php"> Manager Login</a></li> -->

            </ul>
            </li>
          </ul>

<?php
}
?>
        </div>

      </div>
    </nav>

<h5>About Our Restaurant<h5>
   <div class="wide">
  <div class="content">
    <h2 class="about-heading" >Serving great food since 2002</h2>
    <p class="about-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum eius culpa nam tenetur. Reprehenderit, qui omnis? Porro dicta qui fugiat laboriosam aspernatur nobis amet aliquam nulla est? Aut, eligendi iste? Reiciendis cum suscipit nesciunt laboriosam repellat, consequuntur ratione consectetur nam atque maxime amet quos commodi sunt modi quae repudiandae libero rem aperiam itaque quis quaerat dolore error voluptatibus sapiente. Perferendis provident est facilis nam iusto nulla dolorum dignissimos minima quibusdam veritatis deserunt hic doloremque fugit beatae distinctio, maiores sunt earum doloribus totam nostrum accusantium blanditiis sit ipsa. At voluptates totam amet quaerat nihil aliquam molestiae maiores quos quo nulla! Explicabo.</p>
  </div>
  <div class="video">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID_HERE" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
        <div class="mission-vision">
  <h3>Our Mission</h3>
  <hr class="colored-line">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam quod quis inventore in nisi quos illo possimus quam necessitatibus, laborum consequuntur facilis tempora, sed fuga blanditiis provident earum culpa. Harum voluptates adipisci omnis doloribus minima sunt ea odio! Quas maiores error aliquam laborum quia tempore eius minima facilis, earum fugiat obcaecati doloribus voluptatem quibusdam magni dicta omnis aliquid ratione unde consequuntur excepturi dolores fugit. Enim, ratione voluptas nemo accusamus ad deserunt nulla illum id dolore, doloremque culpa corporis saepe similique numquam aliquam unde esse atque debitis illo ullam! Deserunt laboriosam inventore consequuntur. Vel facilis maxime nulla doloribus eligendi eveniet quaerat.</p>
  
  <h3>Our Vision</h3>
    <hr class="colored-line">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe laudantium unde officiis quam voluptatem cupiditate dignissimos eum perspiciatis voluptatum. Suscipit, vel tempore. Sit ducimus quia deleniti explicabo exercitationem repellat incidunt, eaque aliquam blanditiis praesentium eos repellendus voluptatem illo consequatur labore ea ullam laudantium a! Nam asperiores est labore! Totam odio, officia vero, quasi animi optio suscipit rem velit reiciendis laborum deserunt quia? Quis dolorem itaque obcaecati iusto eos. Animi dolorum molestiae minus voluptatum ducimus deserunt enim, reiciendis excepturi assumenda doloremque. Eligendi laboriosam, qui illo sequi doloremque obcaecati autem ut. Modi inventore dolorem eius tenetur cupiditate expedita enim libero eligendi minus.</p>
</div>
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