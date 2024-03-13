
<html>

  <head>
    <title> Home | Between Two Buns</title>


<div class="container">
  <h1>Order Approval</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Food Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- Fetch and display order details from the database -->
      <?php
// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Query the database to fetch order details
$query = "SELECT * FROM orders WHERE status = 'pending'";
$result = mysqli_query($conn, $query);

// Display order details in a table
while ($row = mysqli_fetch_assoc($result)) {
  echo '<tr>';
  echo '<td>' . $row['id'] . '</td>';
  echo '<td>' . $row['customer_name'] . '</td>';
  echo '<td>' . $row['food_item'] . '</td>';
  echo '<td>' . $row['quantity'] . '</td>';
  echo '<td>' . $row['price'] . '</td>';
  echo '<td>' . $row['address'] . '</td>';
  echo '<td>' . $row['status'] . '</td>';
  echo '<td><button class="btn btn-primary approve-btn" data-id="' . $row['id'] . '">Approve</button></td>';
  echo '</tr>';
}
?>
    </tbody>
  </table>
</div>
<script>
    $(document).ready(function() {
  $('.approve-btn').click(function() {
    var order_id = $(this).data('id');

    // Send an AJAX request to approve the order
    $.ajax({
      type: 'POST',
      url: 'approve-order.php',
      data: {
        id: order_id
      },
      success: function(data) {
        // Reload the page to display the updated order status
        location.reload();
      }
    });
  });
});
</script>
</body>
</html>