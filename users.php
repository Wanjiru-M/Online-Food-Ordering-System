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
        /* Add your CSS styles here */
        /* Styling for the form container */
        body {
            font-family: "Bellota Text", sans-serif;
        }
        table {
            max-width: 100%;
            border-collapse: collapse;
            margin-left: 260px;
            margin-bottom: 20px; /* Add margin bottom to create space for the form */
        }
        th, td {
            padding: 25px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #CEDEBD;
        }
        h4 {
            margin-left: 260px;
            background-color: #183D3D;
            height: 50px;
            color:#fff;
            padding: 10px;
        }

        /* Styling for form container */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute; /* Position the form */
            top: 100px; /* Adjust the top position as needed */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            display: none; /* Initially hide the form */
        }
        /* .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */
        
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
</head>
<body>
     <?php
include('admin_panel.php');
?>
    <h2>Registered Users</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            require 'connection.php';
            $conn = Connect();

            // Retrieve list of users from the database
            $query = "SELECT * FROM customer";
            $result = $conn->query($query);

            // Display each user in a table row with an edit button
            if ($result->num_rows > 0) {
                while ($user = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['fullname'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['contact'] . "</td>";
                    echo "<td>" . $user['address'] . "</td>";
                    echo "<td><button onclick='editUser(\"" . $user['username'] . "\", \"" . $user['fullname'] . "\", \"" . $user['email'] . "\", \"" . $user['contact'] . "\", \"" . $user['address'] . "\")'><i class='fa fa-edit'style='color: #333;'></i></a></td>";
                
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found.</td></tr>";
            }

            // Close database connection
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Form container for editing user details -->
    <div class="form-container" id="editForm" style="display: none;">
        <h2>Edit User</h2>
        <form method="POST" action="update_user.php">
            <input type="hidden" name="username" id="editUsername">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="editFullname" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="editEmail" required><br>
            <label for="contact">Contact:</label>
            <input type="tel" name="contact" id="editContact" required><br>
            <label for="address">Address:</label>
            <textarea name="address" id="editAddress" required></textarea><br>
            <button type="submit">Update User</button>
        </form>
    </div>

    <script>
        // Function to populate and display the edit form
        function editUser(username, fullname, email, contact, address) {
            document.getElementById('editUsername').value = username;
            document.getElementById('editFullname').value = fullname;
            document.getElementById('editEmail').value = email;
            document.getElementById('editContact').value = contact;
            document.getElementById('editAddress').value = address;
            document.getElementById('editForm').style.display = 'block';
        }
    </script>
</body>
</html>
