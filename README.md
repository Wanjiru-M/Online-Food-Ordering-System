# Online Food Ordering System

## Introduction

This is an online food ordering system built using HTML, CSS, JavaScript, and PHP. It allows users to browse through available food items, place orders, and make payments securely.

## Requirements

To run this system, you need:

- Web server (e.g., Apache, Nginx)
- PHP (>= 7.0)
- MySQL or any other compatible database server

## Installation

1. Clone or download the repository to your local machine:
   git clone https://github.com/your_username/online-food-ordering-system.git

2. Move the downloaded files to your web server's root directory.

3. Create a new MySQL database for the system.

4. Import the provided SQL file (`database.sql`) into your newly created database. This will create the necessary tables and populate them with sample data.

5. Configure the database connection in `config.php`:

```php
<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'your_database_username';
$dbPassword = 'your_database_password';
$dbName = 'your_database_name';

// Connect to the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
```

Modify other settings in config.php if necessary, such as base URL or currency settings.

Start your web server.

Access the system through your web browser using the configured base URL.

## Usage

- Users can browse through available food items, view details, and add them to their cart.
- They can proceed to checkout, provide delivery details, and make payments securely.
- Admin users can manage food items, categories, orders, and customers through the admin panel.
- Regular users can create accounts, manage their profiles, view order history, and reorder from previous orders.
