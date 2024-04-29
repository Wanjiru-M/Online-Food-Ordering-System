<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Styling for the form container */
.form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Styling for form labels */
.form-container label {
    display: block;
    margin-bottom: 8px;
}

/* Styling for form input fields */
.form-container input[type='text'],
.form-container input[type='email'],
.form-container input[type='tel'],
.form-container textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Styling for form button */
.form-container button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Hover effect for form button */
.form-container button:hover {
    background-color: #45a049;
}
</style>
<?php
// Include database connection
require 'connection.php';
$conn = Connect();

// Check if username is provided in the URL
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user details from the database
    $query = "SELECT * FROM customer WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Check if form data has been submitted
        if (isset($_POST['submit'])) {
            // Retrieve updated user details from the form
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];

            // Update user details in the database
            $updateQuery = "UPDATE customer SET fullname = '$fullname', email = '$email', contact = '$contact', address = '$address' WHERE username = '$username'";
            if ($conn->query($updateQuery) === TRUE) {
                // Redirect to admin dashboard page after successful update
                header("location: users.php");
                exit();
            } else {
                echo "Error updating user details: " . $conn->error;
            }
        }

        // Display the form to edit user details
        echo "<h2>Edit User</h2>";
        echo "<form method='POST'>";
        echo "<label for='fullname'>Full Name:</label>";
        echo "<input type='text' name='fullname' value='" . $user['fullname'] . "' required><br>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' name='email' value='" . $user['email'] . "' required><br>";
        echo "<label for='contact'>Contact:</label>";
        echo "<input type='tel' name='contact' value='" . $user['contact'] . "' required><br>";
        echo "<label for='address'>Address:</label>";
        echo "<textarea name='address' required>" . $user['address'] . "</textarea><br>";
        echo "<button type='submit' name='submit'>Update</button>";
        echo "</form>";
    } else {
        echo "User not found.";
    }
} else {
    echo "Username not provided.";
}

// Close database connection
$conn->close();
?>
