<?php
include('session_m.php');
// include('db_connection.php');

// Check if username is provided in the URL
if(isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user details from the database using username
    $sql = "SELECT * FROM customer WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Username not provided.";
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Update user details in the database
    $update_sql = "UPDATE customer SET fullname = '$fullname', email = '$email', contact = '$contact', address = '$address' WHERE username = '$username'";
    if(mysqli_query($conn, $update_sql)) {
        echo "<script>alert('User details updated successfully.'); window.location.replace('user_report.php');</script>";
        exit;
    } else {
        echo "Error updating user details: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <?php include('admin_panel.php'); ?>
    <h1>Edit User</h1>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" readonly>
        <br>
        <label>Fullname:</label>
        <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>">
        <br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $user['contact']; ?>">
        <br>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>">
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
