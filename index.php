<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "gymbook-server.mysql.database.azure.com";
$username = "npfxzsjaxr";
$password = "PKT58F3662KKRBTN$";
$dbname = "gymbook-server";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all tables in the database
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Check if there are any tables
if ($result->num_rows > 0) {
    echo "Tables in the database: <br>";
    while ($row = $result->fetch_assoc()) {
        echo $row["Tables_in_" . $dbname] . "<br>";
    }
} else {
    echo "No tables found in the database.";
}

// Close connection
$conn->close();
