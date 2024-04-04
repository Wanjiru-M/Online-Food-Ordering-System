# Online Food Ordering System

## Introduction

This is an online food ordering system built using HTML, CSS, JavaScript, and PHP. It allows users to browse through available food items, place orders, and make payments securely.

## Tech Stack

## Frontend

- HTML: Used for structuring the content of web pages.
- CSS: Employed for styling and visually enhancing the presentation of HTML elements.
- JavaScript (JS): Utilized for adding interactivity and dynamic behavior to web pages, enhancing user experience.
- Bootstrap for developing responsive and visually appealing frontend interface.

## Backend

PHP (Hypertext Preprocessor): Acted as the server-side scripting language, processing requests from the frontend, interacting with the database, and generating dynamic content.

## Database

MySQL: Employed as the relational database management system (RDBMS) to store and manage structured data related to the restaurant's menu, user accounts, orders, and transaction details.

## API Integration

Daraja API: Integrated into the backend to facilitate payment processing. The Daraja API provides a secure and reliable platform for handling online payments, ensuring smooth transactions between the customer and the restaurant.

## Version Control:

Git: Used for version control management, enabling tracking of changes to the project's source code.

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
