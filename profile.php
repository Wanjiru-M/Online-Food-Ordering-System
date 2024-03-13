


<?php
session_start();

// Check if user is logged in
if (isset($_SESSION["login_user2"])) {
  // User is logged in, proceed to profile page
} else {
  // Redirect to login page if not logged in
  header("location: login_u.php");
  exit(); // Exit script to prevent further execution
}

// Include database connection
require 'connection.php';
$conn = Connect();

// Fetch user data
$username = $_SESSION["login_user2"];
$query = "SELECT * FROM customer WHERE username = '$username'";
$result = $conn->query($query);

// Check if user data is retrieved successfully
if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
} else {
  echo "Error: User not found.";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Profile</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Include Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-E6zEjhAZw60R43Xen4sOlHaC7K57D5l1aNKLiA6vMd7YAZtTvDvX1uGzZuFS/sIQ" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
    }
    th, td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #4CAF50;
      color: white;
      text-align: left;
    }
    td {
      font-weight: bold;
    }
    .profile-icon {
      font-size: 48px;
      color: #4CAF50;
      margin-bottom: 20px;
      text-align: center;
    }
    a {
      display: block;
      width: 150px;
      margin: 20px auto;
      text-align: center;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    a:hover {
      background-color: #45a049;
    }
  </style> 
</head>
<body>
  <div class="container">
    <!-- Profile Icon -->
    <div class="profile-icon">
      <i class="fas fa-user-circle"></i>
    </div>
    <h2>Your Profile</h2>
    <table>
      <tr>
        <th colspan="2">Welcome, <?php echo $user["fullname"]; ?></th>
      </tr>
      <tr>
        <td>Username:</td>
        <td><?php echo $user["username"]; ?></td>
      </tr>
      <tr>
        <th colspan="2">Other Information</th>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo $user["email"]; ?></td>
      </tr>
      <tr>
        <td>Contact:</td>
        <td><?php echo $user["contact"]; ?></td>
      </tr>
      <tr>
        <td>Address:</td>
        <td><?php echo $user["address"]; ?></td>
      </tr>
    </table>
    <a href="editprofile.php">Edit Profile</a>
    <a href="foodlist.php">Back to Menu</a>
  </div>
  <footer class="footer">
    <div class="container2">
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
