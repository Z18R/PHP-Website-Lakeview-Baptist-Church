<?php
// $serverName = "DESKTOP-6E9LU1F\SQLEXPRESS"; //serverName\instanceName
// $connectionInfo = array( "Database"=>"Book", "UID"=>"sa", "PWD"=>"18Bz23efBd0J");
// $conn = sqlsrv_connect( $serverName, $connectionInfo);

// try {
//     if ($conn) {
//         echo "Connection established.<br />";
//     } else {
//         throw new Exception("Connection could not be established.<br />");
//     }
// } catch (Exception $e) {
//     echo $e->getMessage();
//     die(print_r(sqlsrv_errors(), true));
// }
// 

function executeSQLUpdate($sql) {
    // Database connection information
    $serverName = "DESKTOP-6E9LU1F\\SQLEXPRESS"; // Server name
    $connectionOptions = array(
        "Database" => "CentralAccess", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "18Bz23efBd0J"        // Password
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Execute the update query
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "<br>";
        echo "<div class='container'><div class='alert alert-success'>Update executed successfully</div></div>";
    }

    // Clean up statement and close connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

