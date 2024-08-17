<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config/config.php';

$dbHost = $config['database']['host'];
$dbName = $config['database']['database'];
$dbUser = $config['database']['username'];
$dbPass = $config['database']['password'];

$dsn = "mysql:host=$dbHost;dbname=$dbName";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
