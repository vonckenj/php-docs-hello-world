<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//$servername = "gymbook-server.mysql.database.azure.com";
//$username = "npfxzsjaxr";
//$password = "Ndu78Dji3nk89)9SDF";
//$dbname = "gymbook-server";


try {
    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, "gymbook-server.mysql.database.azure.com", "npfxzsjaxr", "Ndu78Dji3nk89)9SDF", "gymbook-database", 3306, MYSQLI_CLIENT_SSL);
    
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

echo <"PRE">;
print_r($_SESSION);
echo <"/PRE">;