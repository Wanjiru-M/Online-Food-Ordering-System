<?php
// Include database connection
require 'connection.php';
$conn = Connect();

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Update user details in the database
    $updateQuery = "UPDATE customer SET fullname = ?, email = ?, contact = ?, address = ? WHERE username = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssss", $fullname, $email, $contact, $address, $username);

    if ($stmt->execute()) {
        // Redirect back to the user list page after successful update
        header("location: users.php");
        exit();
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
