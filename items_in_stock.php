<?php
include('session_m.php');
// Include your database connection file
// include('db_connection.php');

// Initialize an array to store the products in stock
$productsInStock = array();

// SQL query to select Name and Quantity of products in stock
$sql = "SELECT name, quantity FROM food";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the data and store it in the $productsInStock array
    while ($row = mysqli_fetch_assoc($result)) {
        $productsInStock[] = $row;
    }
} else {
    // If the query fails, display an error message
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Products in Stock</title>
    <style>
       body{
            font-family: "Bellota Text", sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: 260px;
            z-index:1;
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
         .btn-download {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        /* font-size: 16px; */
        transition: background-color 0.3s;
        margin-left: 835px;
        margin-top: -20px;
    }

    .btn-download:hover {
        background-color: #45a049;
    }

        
    </style>
</head>
<body>
    <?php
include('admin_panel.php');
?>
    <h4>Products in Stock
    <div style="text-align: center; margin-top: px;">
        <a href="download_items_in_stock_report.php" class="btn-download">Download Items Report</a>
                </div></h4>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($productsInStock as $product): ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
