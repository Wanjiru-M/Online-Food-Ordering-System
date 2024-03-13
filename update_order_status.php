
<?php
function toTitleCase($str) {
    $str = ucwords(strtolower($str));
    $str = preg_replace("/[^a-zA-Z0-9 ]/", '', $str);

    // Convert "canceled" to "Cancelled" for the admin view
    if (strtolower($str) == 'canceled' && isset($_SESSION['login_user1'])) {
        $str = 'Cancelled';
    }

    return $str;
}
if(!isset($_SESSION))
  {
    session_start();
  }

include 'connection.php';
$conn = Connect();

// Validate and sanitize order ID and status
$order_id = filter_input(INPUT_POST, 'order_id', FILTER_SANITIZE_NUMBER_INT);
$new_status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if ($order_id && $new_status) { // Basic validation check
  $sql = "UPDATE orders SET order_status = ? WHERE order_ID = ?";
  $stmt = $conn->prepare($sql); // Prepare statement for security
  $stmt->bind_param('si', $new_status, $order_id);
  // Convert "canceled" to "Cancelled" for the admin view
if (strtolower($str) == 'canceled' && isset($_SESSION['login_user1'])) {
    $str = 'Cancelled';
}

  if ($stmt->execute()) {
    $update_successful = true; // Flag for successful update
  } else {
    echo "Error updating order status: " . $conn->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid data provided.";
}

// Redirect if update was successful
if ($update_successful) {
  header("Location: view_order_details.php?order_id=" . $order_id); // Redirect with order ID
  exit; // Stop further script execution
}

?>