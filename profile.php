


<?php

require 'header.php';



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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-E6zEjhAZw60R43Xen4sOlHaC7K57D5l1aNKLiA6vMd7YAZtTvDvX1uGzZuFS/sIQ" crossorigin="anonymous"> -->
  <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    body {
      font-family: "Bellota Text", sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .profile-container {
      width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .profile-icon {
      font-size: 48px;
      color: #4CAF50;
      margin-bottom: 20px;
      text-align: center;
    }
    .profile-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .profile-container table {
      width: 100%;
      border-collapse: collapse;
    }
    .profile-container th, .profile-container td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    .profile-container th {
      background-color: #4CAF50;
      color: white;
      text-align: left;
    }
    .profile-container td {
      font-weight: bold;
    }
    .profile-container a {
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
    .profile-container a:hover {
      background-color: #45a049;
    }
    
    .footer{
      background-color: #333 !important;
      color: #fff !important;
    }
        h1 { text-align: center; color: #4CAF50; font-size: 36px; margin-bottom: 30px; }
  </style>
</head>
<body>

  <div class="profile-container">
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
 <?php include 'footer.php'; ?>
</body>
</html>