<?php
include('session_m.php');
// Include your database connection file
// Example: include('db_connection.php');

// Assuming you have a database connection established

// Query to fetch users from the 'customer' table
$sqlUsers = "SELECT * FROM customer";

// Execute the query
$resultUsers = mysqli_query($conn, $sqlUsers);

// Check if the query was successful
if (!$resultUsers) {
    die("Error fetching users: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>

    <style>
        body{
            font-family: "Bellota Text", sans-serif;
        }
        table {
            max-width: 100%;
            border-collapse: collapse;
            margin-left: 260px;
        }
        th, td {
            padding: 25px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #CEDEBD;
        }
        h4{
            margin-left: 260px;
            background-color: #183D3D;
            height: 50px;
            color:#fff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
include('admin_panel.php');
?>
 <div style="height: 1000px; overflow-y: auto;">
    <h4>Registered Users</h4>
   
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display user data in the table rows
            while ($row = mysqli_fetch_assoc($resultUsers)) {
                echo "<tr>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['fullname']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['contact']}</td>";
                echo "<td>{$row['address']}</td>";
              echo "<td>{$row['reg_date']}</td>";
          echo "<td>
              <a href='edit.php'><i class='fa fa-edit'style='color: #333;'></i></a>
              <a href='delete.php'><i class='fa fa-trash' style='color: #333;'></i></a>
          </td>";
    echo "</tr>";
            }
            // Free result set
            mysqli_free_result($resultUsers);
            ?>
        </tbody>
    </table>
        </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
