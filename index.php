<?php
session_start();
?>

<html>

  <head>
    <title> Home | Between Two Buns</title>
    <style>
body{
         font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
  }
  .container2 {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  .specials {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
  }
  .span-special {
    color: #FF4500; 
  }
  .home-image {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
  }
  .home-burger {
    width: 100%;
    max-width: 300px;
    height: auto;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
      .wide{
        background: url("images/img1.jpg") cover center/cover ;
        background-color: #000!important;
      }
      .img{
        
      }
     .tag{
      font-family: "Dancing Script", cursive;
      font-size: 20px;
      margin-right: 600px;
      margin-left: 30px;
      float:left;
      color: #fff;
      line-height: 1.5;
      opacity: 100%;
     
     }
     .span-tag{
      font-style: italic;
      font-size: 40px;
      margin-top:60px;
      margin-left: 20px;
     }
     .tag-info{
      font-family:  'Outfit', sans-serif;
      color: #fff;
      margin-left: 25px;
     }
     .home-image{
      background-color: #333;
     }
        .home-image .home-burger{
          max-width: 15%;
          height: auto;
          
        }
       .home-image .home-burger1,.home-burger2{
        max-width: 25%;
        height: auto;
        margin: 2rem;
        background-color: black;
        border:none;
       }
      .home-image .home-burger3{
        max-width: 160%;
        height: 220px;
        border-radius: 50px;
       }
      .homeorder{
        margin-right: 1100px;
            }
            .btn{
              margin-top: 50px;
            }
      .image-right {
        float: right;
        margin-bottom: -400px;
      
      }
      .inline-image {
        max-width: 50%;
        height: auto;
        float:right;
        margin-top: -230px;
        /* margin-right: 40px; */
        opacity: 3px;
    
      }
      .specials{
        font-family: "Dancing Script", cursive;
        font-size: 40px;
        text-align:center;
      }
      .span-special{
        color: dark-green;
      }
      .navbar, .navbar-inverse, .navbar-fixed-top, .navigation-clean-search{
        background-color: #333 !important;
        

      }
      .navbar>.container .navbar-brand{
        margin-left: -280px !important;
      }
        .navbar-inverse .navbar-nav>li>a:hover{
        color: green !important;
       }
       a.dropdown-toggle .active{
        margin-right:-100px !important;
        color: #fff !important;
       }
       .meet-our-chefs {
  display: flex;
  justify-content: space-around;
  margin-top: 50px;
  position: relative;
  z-index: 5;
}

.che{
  text-align: center;
  width: 30%;
 /* border: 2px solid #ccc; /* Add border to the chef container */
  padding: 20px; 
}

.chef img {
  width: 100%;
  max-width: 150px; 
  border-radius: 5px; 
  margin-bottom: 10px;
}

.chef h3 {
  font-size: 24px;
  margin-bottom: 10px;
color: #f4f4f4;
}

.chef p {
  font-style: italic;
  color: #fff;;
}
.chefs-container {
  position: relative;
background-image: url('images/back1.jpg');
  background-size: cover;
  background-position: center;
  padding: 50px 0;
  background-color: rgba(0, 0, 0, 0.3);
}

.chefs-container::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 100px;
  background-image: linear-gradient(45deg, transparent 25%, #ccc 25%, #ccc 50%, transparent 50%, transparent 75%, #ccc 75%);
  background-size: 10px 10px;
  z-index: -1;
  opacity: 0.5;
  background-attachment: fixed;

}

.chef {
  text-align: center;
  width: 30%;
  padding: 20px;
  position: relative;
  z-index: 2;
}
.btn-lg{
  margin-top: 10px !important;
  margin-left: 70px !important;
}
.container{
      font-size: 16px;
    }
    .wide2 {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 2px;
  margin-top: -80px;
  background-color: #ADBC9F;
  height: 90% !important;
}
 .wide2 > h2 > h5 >p,
 .wide1 > h5{
  text-align: center;
  font-size: 30px !important; */
  margin-top: 10px !important;
  color: #333 !important;
  /* font-family:'Outfit', sans-serif !important;   */
  
}
.content > p{
  text-align: center;
  margin-top:  !important;
  color: #333 !important;
  font-family:'Outfit', sans-ser;  
  font-size: 20px;
  
}

.colored-line {
  border-top: 2px solid #ff0000 !important; 
  width: 70px !important; 
  margin-top: 10px !important; 
  margin-bottom: 10px; 
  z-index: 5 !important;
}

.about-content{
  font-size: 18px !important;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
  line-height: 1.5;
  text-align: justify !important;
}
.about1-heading{
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
  text-align: justify !important;
}


.footer{
  background-color: #333;
  color: #fff;
}
.mypanel{
  background-color:#E8EFCF;
  border-radius: 12px;
  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
.text-info{

}
.text-dark{

}
.img-responsive{
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
}
.btn-success{
  margin-bottom: 70px !important;
}
      </style>

  

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
</head>
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
          <a class="navbar-brand" href="index.php">Between Two Buns</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active" ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
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
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
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
            <!-- <li><a href="profile.php">Your Profile</a></li>-->
            <li><a href="orders.php"><span class="glyphicon glyphicon-log-out"></span> My Orders </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <!-- <ul class="dropdown-menu"> -->
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

    <div class="wide">
      	<div class="col-xs-5 line"><hr></div>
        <div class="col-xs-2 logo"  style="padding: -1x;"><img src="images/logoImage.png" style="padding: -50px;"></div>
        <div class="col-xs-5 line"><hr></div>
        <!--<div class="tagline">Eat Healthy & Be Happy</div>-->
        <div class="tag"><span class="span-tag">Eat Healthy $ Be Happy</span>
          <br>
          <p class="tag-info">We are not just serving burgers,<br> we are serving up an unforgettable experience.<br> every bite is a journey through layers of flavor and satisfaction<br>Come hungry, leave happy- your taste buds will thank you.
      </div>
     <div class="image-right">
          <img src="images/trial3.jpg" class="inline-image">
        </div>
        <div class="homeorder">
    <center><a class="btn btn-success btn-lg" href="customerlogin.php" role="button" > Order Now </a></center>
    </div>
       
      </div>
      <!--  
      <p class="specials">Today's <span class="span-special">special<p>
       <div class="home-image">
          <img src="images/home2.jpeg" class="home-burger">
          
            <img src ="images/burger1.jpg" alt="burger" class="home-burger1">
            <img src="images/burger3.jpg" alt="burger" class="home-burger2">
            
            <img src="images/burger2.jpg" alt="burger" class="home-burger3">
          </div>
        </div>
    <br>
-->
    <!-- section to display today's specials -->
<div class="container" style="width: 95%;">
  <div class="row">
    <div class="col-md-12">
      <p class="specials">Today's <span class="span-special">special<p>
    </div>
  </div>

  <!-- Display today's specials (specific items) -->
  <?php
  require 'connection.php';
  $conn = Connect();

  $special_items = array("Double Patty Burger", "The Yankee Beef Burger", "Classic Cheese Burger", "Lumbjack Burger", "Jalapeno Burger", "Veggie Burger"); // Specify the items you want to display as specials

  foreach ($special_items as $item) {
    $sql = "SELECT * FROM FOOD WHERE options = 'ENABLE' AND name = '$item'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-4">
          <div class="mypanel" align="center">
            <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
            <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
            <h5 class="text-info"><?php echo $row["description"]; ?></h5>
            <h5 class="text-danger">Ksh <?php echo $row["price"]; ?>/-</h5>
            <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
            <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
              <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
              <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
              <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
              <?php
              if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                echo '<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">';
              } else {
                echo '<a href="customerlogin.php" style="margin-top:5px;" class="btn btn-success"> Add to Cart</a>';
              }
              ?>
            </form>
          </div>
        </div>
      <?php
      }
    }
  }

  if (empty($special_items)) {
    ?>
    <div class="col-md-12">
      <div class="jumbotron">
        <center>
          <label style="margin-left: 5px;color: red;"> <h1>Oops! No specials available today.</h1> </label>
          <p>Check back tomorrow for more delicious specials!</p>
        </center>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<!-- Our Chefs -->
 <h1 class="specials">Meet Our <span class="span-special">Chefs</h2>
<section class="meet-our-chefs">
  <div class="chefs-container">
 
  
<div style="text-align: center;">
 
</div>

<section class="meet-our-chefs">

  <div class="chef">
    
    <img src="images/chef20.jpg" alt="Chef 1">
    <h3>Chef John Doe</h3>
    <p>Executive Chef</p>
    <p>"With over 15 years of culinary experience, Chef John brings creativity and passion to every dish he creates."</p>
  </div>
  <div class="chef">
    <img src="images/chef5.jpg" alt="Chef 2">
    <h3>Chef Jane Smith</h3>
    <p>Lead Chef</p>
    <p>"Chef Jane specializes in crafting exquisite burgers that are as beautiful as they are delicious."</p>
  </div>
  <div class="chef">
    <img src="images/chef10.jpg" alt="Chef 3">
    <h3>Chef Michael Lee</h3>
    <p>Sous Chef</p>
    <p>"Chef Michael brings precision and attention to detail to every aspect of the culinary process, ensuring each dish is executed flawlessly."</p>
  </div>
</section>
</div>
</section>
<div class="wide1">
    <h5 class="specials">About Our <span class="span-special">Restaurant</span></h5>
   
    <hr class="colored-line">
</div>

</div>

   <div class="wide2">
  <div class="content">
    <h2 class="about1-heading" >Serving great food since 2002</h2>
    <p class="about-content">Our restaurant,offers an unparalleled culinary experience in the heart of the city. Indulge in the savory delight of our gourmet burgers crafted with the finest ingredients sourced locally. Each bite promises a symphony of flavors that tantalize your taste buds and leave you craving for more. Our commitment to quality shines through every dish, ensuring that every visit is a memorable one. Whether you're a connoisseur of classic flavors or seeking bold, innovative combinations, our menu offers something to delight every palate. Join us at Burger Delight and embark on a gastronomic journey like no other</p>
  </div>
  <div class="video">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/L6yX6Oxy_J8?si=AGgflx5EMJQcVfzx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

  </div>
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

    <div class="container" >
    <div class="col-md-5" style="float: none; margin: 0 auto;">
      <div class="form-area" style="border: 1px solid GREY; border-radius:12px; padding: 10px 40px 60px;margin: 10px 0px 60px;border: 1px solid GREY; opacity: 0.9;">
        <form method="post" action="">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Contact Form</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus="">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>     

          <div class="form-group">
            <input type="Number" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>

          <div class="form-group">
           <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
           <span class="help-block"><p id="characterLeft" class="help-block">Max Character length : 140 </p></span>
          </div> 
          <input type="submit" name="submit" type="button" id="submit" name="submit" class="btn btn-primary pull-right"/>    
        </form>

        
      </div>
    </div>
      
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
  
    <title> Cart | Between Two Buns </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/cart.css">
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
          <a class="navbar-brand" href="index.php">Between Two  Buns</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
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
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
             (<?php
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

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <!-- <li> <a href="managersignup.php"> Manager Sign-up</a></li> -->
              <!-- <li> <a href="#"> Admin Sign-up</a></li> -->
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <!-- <li> <a href="managerlogin.php"> Manager Login</a></li> -->
              <!-- <li> <a href="managerlogin.php"> Admin Login</a></li> -->
            </ul>
            </li>
          </ul>

<?php
}
?>

</html>