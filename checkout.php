
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
//get total amount
$totalAmount = isset($_GET['total'])? $_GET['total'] : null;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width:300px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #4CAF50;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="https://changadventure.co.ke/mpesafiles/stk_push.php" method="post">
    <label for="phoneNumber">Phone Number:</label>
    <input placeholder="Enter Phone Number" type="text" name="phoneNumber" required/>
    <label for="totalAmount">Total Amount:</label>
    <input value="<?php echo $totalAmount;?>" name="totalAmount" required readonly/><br />
    <button type="submit">Pay Now</button>
</form>
    
</body>
</html>
