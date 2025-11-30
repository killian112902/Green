<?php
// Database connection settings - adjust as needed for your environment
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // XAMPP default
$DB_NAME = 'green_store';

// Create connection
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_errno) {
    // In production don't expose details
    error_log("DB connection failed: " . $mysqli->connect_error);
    die('Database connection failed.');
}

// Use utf8mb4
$mysqli->set_charset('utf8mb4');

return $mysqli;
