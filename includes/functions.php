<?php
// Autoload Composer dependencies (if not already done)
require 'vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


function get_db_connection($db_name)
{
    // Retrieve environment variables
    $db_host = $_ENV['DB_HOST'];
    // $db_name = $_ENV['DB_NAME'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASS'];

    try {

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        echo "Connected successfully!";
        return $conn;
    } catch (Exception $e) {
        // Handle connection errors
        echo "Database connection failed: " . $e->getMessage();
    }
    return -1;
}
