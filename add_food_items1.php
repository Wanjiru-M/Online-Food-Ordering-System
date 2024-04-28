<?php
include('session_m.php');
$foodImage = $_FILES['food_image'];

if(!isset($login_session)){
    header('Location: managerlogin.php'); 
    exit(); // Add exit after header redirect to stop script execution
}

$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);

// Storing Session
$user_check=$_SESSION['login_user1'];
$R_IDsql = "SELECT RESTAURANTS.R_ID FROM RESTAURANTS, MANAGER WHERE RESTAURANTS.M_ID='$user_check'";
$R_IDresult = mysqli_query($conn,$R_IDsql);
$R_IDrs = mysqli_fetch_array($R_IDresult, MYSQLI_BOTH);
$R_ID = $R_IDrs['R_ID'];

// Check if file is uploaded
if(isset($_FILES['food_image'])){
    $file_name = $_FILES['food_image']['name'];
    $file_size = $_FILES['food_image']['size'];
    $file_tmp = $_FILES['food_image']['tmp_name'];
    $file_type = $_FILES['food_image']['type'];

    // Allow certain file formats
    $allowed_formats = array('jpg', 'jpeg', 'png', 'gif');
    $file_ext = strtolower(end(explode('.', $file_name)));

    // Check if file format is allowed
    if(in_array($file_ext, $allowed_formats)){
        // Upload file to server
        $upload_path = 'images/' . $file_name;
        if(move_uploaded_file($file_tmp, $upload_path)){
            // File uploaded successfully
            $images_path = $upload_path;

            // Insert data into database
            $query = "INSERT INTO FOOD(name,price,description,R_ID,images_path) VALUES('" . $name . "','" . $price . "','" . $description . "','" . $R_ID ."','" . $images_path . "')";
            $success = $conn->query($query);
            
            if ($success) {
                echo "SUCCESS";
                header('Location: add_food_items.php');
                exit(); // Add exit after header redirect to stop script execution
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            // File upload failed
            echo 'File upload failed.';
        }
    } else {
        // File format not allowed
        echo 'File format not allowed.';
    }
} else {
    // No file uploaded
    echo 'No file uploaded.';
}

$conn->close();
?>



