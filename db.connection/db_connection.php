<?php

// Keep raw MySQL warnings off the public page.
// We handle connection errors ourselves below.
mysqli_report(MYSQLI_REPORT_OFF);

$conn = null;
$db_error = null;

$serverName = $_SERVER['SERVER_NAME'] ?? '';
$httpHost   = $_SERVER['HTTP_HOST'] ?? '';

$isLocal = in_array($serverName, ['localhost', '127.0.0.1', '::1'], true)
    || strpos($httpHost, 'localhost') === 0
    || strpos($httpHost, '127.0.0.1') === 0;

if ($isLocal) {

    // ==========================================
    // LOCAL XAMPP DATABASE
    // ==========================================
    $servername = "127.0.0.1";
    $username   = "root";
    $password   = "";
    $dbname     = "drsubhash";

    // XAMPP normally uses 3306.
    // 3307 is also tried automatically in case the port was changed.
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
            $db_error = null;
            break;
        }

        $db_error = $testConnection->connect_error;
    }

} else {

    // ==========================================
    // LIVE SERVER DATABASE
    // ==========================================
    $servername = "localhost";
    $username   = "drsubhashplasticsurgeon_com";

    // Replace this with the actual live DB password before uploading live.
    $password   = "YOUR_EXISTING_LIVE_PASSWORD";

    $dbname     = "drsubhashplasticsurgeon_com";

    $liveConnection = @new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );

    if (!$liveConnection->connect_errno) {
        $conn = $liveConnection;
        $conn->set_charset("utf8mb4");
        $db_error = null;
    } else {
        $db_error = $liveConnection->connect_error;
        $conn = null;
    }
}

// IMPORTANT:
// Do not use die() here.
// Pages can check $conn and show a friendly fallback instead of crashing.
?>
