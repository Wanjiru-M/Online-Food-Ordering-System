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
    .specials{
           font-family: "Dancing Script", cursive !important;
        font-size: 40px;
        text-align:center;
      }
      .span-special{
        color: #FF4500;
      }
      .mission-vision {
  padding: 50px;
  position: relative; 
  color: #fff; 
  background-image: url('images/04.jpg');
}

.mission-vision::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); 
  background-image: linear-gradient(45deg, transparent 25%, #ccc 25%, #ccc 50%, transparent 50%, transparent 75%, #ccc 75%);
  background-size: 10px 10px;
  z-index: -1;
  opacity: 0.5;
  background-attachment: fixed;
}

.mission-vision h3,
.mission-vision p {
  position: relative; 
  z-index: 1;

}

.mission-vision h3 {
  font-size: 24px;
  margin-bottom: 10px;
  text-align: center;
  
}

.mission-vision p {
  font-size: 16px !important;
  line-height: 1.5;
  margin-left: 30px;
  color: #31363F;
  text-align: justify;
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
  border-top: 2px solid #ff0000; 
  width: 70px; 
  margin-top: 10px; 
  margin-bottom: 10px; 
}

.about-content{
  font-size: 20px !important;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
  line-height: 1.5;
  text-align: justify;
}
.about-heading{
  text-align: center;
  font-size: 40px !important; */
  color: #333 !important;
  font-family: "Dancing Script", cursive !important;
     

}
.content {
  width: 50%; 
  margin-left: 50px;
}


.video {
  width: 40%;
}

.video iframe {
  width: 100%;
  height: 50%;
}
.mission-vision {
  margin-top: -100px; 
}

.mission-vision h3 {
  font-size: 24px;
  margin-bottom: 10px;
  text-align: center;
}

.mission-vision p {
  font-size: 16px;
  line-height: 1.5;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.footer{
        background-color: #333;
        color: #fff !important;
      }

</style>
  <link rel="stylesheet" type = "text/css" href ="css/aboutus.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/index.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400&family=Big+Shoulders+Display:wght@700&display=swap">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700&display=swap">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
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

<h5 class="specials">About Our <span class="span-special"> Restaurant <h5>
  <hr class="colored-line">
   <div class="wide">
  <div class="content">
    <h2 class="about-heading" >Serving great food since 2002</h2>
    <p class="about-content">Our restaurant,offers an unparalleled culinary experience in the heart of the city. Indulge in the savory delight of our gourmet burgers crafted with the finest ingredients sourced locally. Each bite promises a symphony of flavors that tantalize your taste buds and leave you craving for more. Our commitment to quality shines through every dish, ensuring that every visit is a memorable one. Whether you're a connoisseur of classic flavors or seeking bold, innovative combinations, our menu offers something to delight every palate. Join us at Burger Delight and embark on a gastronomic journey like no other</p>
  </div>
  <div class="video">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/L6yX6Oxy_J8?si=AGgflx5EMJQcVfzx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

  </div>
</div>
         <div class="mission-vision">
  <h3 class="specials">Our Mission</h3>
  <hr class="colored-line">
  <p>Our mission is to redefine the burger experience by delivering unparalleled taste and quality in every bite. We are dedicated to sourcing the freshest ingredients and crafting them into mouthwatering burgers that exceed our customers' expectations.

Driven by a passion for culinary excellence, we strive to create a welcoming environment where friends and families can come together to enjoy delicious food and create lasting memories. We believe in the power of good food to bring people closer and enrich their lives.

Our commitment extends beyond just serving great burgers. We are also dedicated to sustainability and community involvement.</p>
  
  <h3 class="specials">Our Vision</h3>
    <hr class="colored-line">
  <p>Our vision is to be the ultimate destination for burger enthusiasts, known not only for our exceptional taste but also for our commitment to innovation and customer satisfaction. We envision a future where every bite of our burgers evokes joy and satisfaction, where our brand becomes synonymous with quality and excellence in the culinary world.

We aspire to create an atmosphere where creativity flourishes, where our chefs are empowered to experiment with flavors and techniques to continuously elevate our menu offerings. Our vision extends beyond just serving delicious food; we aim to create memorable experiences for our customers, forging lasting connections and building a community around our love for burger.</p>
</div>
<div class="col-xs-12 line"><hr></div>
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
                    <li style="display: inline-block; margin-right: 10px;"><a href="www.facebook.com" style="color: green;"><i class="fab fa-facebook fa-2x"></i></a></li>
                    <li style="display: inline-block; margin-right: 10px;"><a href="www.twitter.com" style="color: green;"><i class="fab fa-twitter fa-2x"></i></a></li>
                    <li style="display: inline-block;"><a href="www.instagram.com" style="color: green;"><i class="fab fa-instagram fa-2x" ></i></a></li>
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