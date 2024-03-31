<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
</html>

<?php

session_start();

// Check if user is logged in (same as profile page)
if (isset($_SESSION["login_user2"])) {

    // Include database connection and retrieve user data (same as profile page)
    require 'connection.php';
    $conn = Connect();

    $username = $_SESSION["login_user2"];
    $query = "SELECT * FROM customer WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if form data has been submitted
        if (isset($_POST["fullname"])) {

            // Retrieve form data
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $address = $_POST["address"];

            // Update user data in database
            $query = "UPDATE customer SET fullname = '$fullname', email = '$email', contact = '$contact', address = '$address' WHERE username = '$username'";
            $result = $conn->query($query);

            if ($result) {
                // Redirect to profile page
                header("location: profile.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }

            
            echo "<script>alert('Profile updated successfully.'); window.location.replace('profile.php');</script>";
        }

        // Form to edit profile
        echo "<h2>Edit Profile</h2>";
        echo "<form action='editprofile.php' method='POST'>";
        echo "<label for='fullname'>Full Name:</label>";
        echo "<input type='text' name='fullname' id='fullname' value='" . $user['fullname'] . "' required>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' name='email' id='email' value='" . $user['email'] . "' required>";
        echo "<label for='contact'>Contact:</label>";
        echo "<input type='tel' name='contact' id='contact' value='" . $user['contact'] . "' required>";
        echo "<label for='address'>Address:</label>";
        echo "<textarea name='address' id='address' required>" . $user['address'] . "</textarea>";
        echo "<button type='submit'>Update Profile</button>&nbsp;&nbsp;";
echo "<button type='submit'>Back to Profile</button>";
 
        echo "</form>";
    } else {
        echo "Error: User not found.";
    }

    // Close database connection
    $conn->close();
} else {
    // Redirect to login page if not logged in (same as profile page)
    header("location: login_u.php");
    exit();
}

?>
