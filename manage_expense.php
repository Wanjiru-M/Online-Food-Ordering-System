<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Expenses</title>
</head>
<body>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            margin: 20px auto;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 10px;
        }
        form input[type="text"],
        form input[type="number"],
        form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            margin-left: 280px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        </style>
    <h2>Manage Expenses</h2>
    <!-- Form to input new expenses -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="expense_name">Expense Name:</label>
        <input type="text" name="expense_name" required><br>
        <label for="expense_amount">Amount:</label>
        <input type="number" name="expense_amount" required><br>
        <label for="expense_date">Date:</label>
        <input type="date" name="expense_date" required><br>
        <button type="submit" name="new_expense">Add Expense</button>
    </form>

    <br>

    <!-- Display existing expenses in a table -->
    <table>
        <thead>
            <tr>
                <th>Expense Name</th>
                <th>Amount</th>
                <th>Date</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            require 'connection.php';
            $conn = Connect();

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Handle new expense submission
                if (isset($_POST["new_expense"])) {
                    $expense_name = $_POST["expense_name"];
                    $expense_amount = $_POST["expense_amount"];
                    $expense_date = $_POST["expense_date"];

                    // Insert new expense into database
                    $query = "INSERT INTO expenses (expense_name, expense_amount, expense_date) VALUES ('$expense_name', $expense_amount, '$expense_date')";
                    $conn->query($query);

                    // Display the newly added expense in the table
                    echo "<tr>";
                    echo "<td>" . $expense_name . "</td>";
                    echo "<td>" . number_format($expense_amount, 2, '.', ',') . " Ksh</td>";
                    echo "<td>" . $expense_date . "</td>";
                    // echo "<td><button>Edit</button></td>";
                    echo "</tr>";
                }
            }

            // Retrieve expenses from the database
            $query = "SELECT * FROM expenses";
            $result = $conn->query($query);

            // Display expenses in table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['expense_type'] . "</td>";
                    echo "<td>" . number_format($row['amount'], 2, '.', ',') . " Ksh</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    // echo "<td><button>Edit</button></td>"; // Add edit button functionality
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No expenses found.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
    <?php
include('admin_panel.php');
?> 
</html>