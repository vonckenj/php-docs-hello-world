<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "gymbook-server.mysql.database.azure.com";
$username = "npfxzsjaxr";
$password = "PKT58F3662KKRBTN$";
$dbname = "gymbook-server";

$mysqli_config = [
    "ssl" => [
        "key"    => "path/to/client-key.pem",
        "cert"   => "path/to/client-cert.pem",
        "ca"     => "path/to/ca-cert.pem",
    ],
];

try {
    // Create secure connection
    $conn = new mysqli($servername, $username, $password, $dbname, null, null, $mysqli_config);


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

    $conn->close();
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}