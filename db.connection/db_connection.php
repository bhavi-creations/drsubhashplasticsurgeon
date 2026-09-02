<?php

// Hide raw mysqli warnings from website output
mysqli_report(MYSQLI_REPORT_OFF);

$conn = null;
$db_error = null;

// Check whether website is running on localhost
$isLocal = isset($_SERVER['SERVER_NAME']) &&
    in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', '::1'], true);


if ($isLocal) {

    // ===============================
    // LOCALHOST DATABASE
    // ===============================

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "drsubhash";

    // XAMPP commonly uses 3306.
    // If 3306 is busy, sometimes MySQL runs on 3307.
    $localPorts = [3306, 3307];

    foreach ($localPorts as $port) {

        $testConnection = @new mysqli(
            $servername,
            $username,
            $password,
            $dbname,
            $port
        );

        if (!$testConnection->connect_errno) {

            $conn = $testConnection;

            $conn->set_charset("utf8mb4");

            break;

        } else {

            $db_error = $testConnection->connect_error;
        }
    }

} else {

    // ===============================
    // LIVE SERVER DATABASE
    // ===============================

    $servername = "localhost";

    $username = "drsubhashplasticsurgeon_com";

    // KEEP YOUR EXISTING LIVE PASSWORD HERE
    $password = "YOUR_EXISTING_LIVE_PASSWORD";

    $dbname = "drsubhashplasticsurgeon_com";

    $conn = @new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );

    if ($conn->connect_errno) {

        $db_error = $conn->connect_error;

        $conn = null;

    } else {

        $conn->set_charset("utf8mb4");
    }
}


// IMPORTANT:
// Do not use die() here.
// If database is unavailable, remaining website including footer
// should still continue loading.
?>