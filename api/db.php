<?php
// includes/db.php

$host = "sql206.infinityfree.com";
$db   = "if0_40420649_lazzatkart";
$user = "if0_40420649";
$pass = "Honey4463";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // throw exceptions on errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // fetch associative arrays by default
        ]
    );
} catch (PDOException $e) {
    // If DB connection fails, return JSON and stop execution
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . $e->getMessage()
    ]);
    exit;
}

