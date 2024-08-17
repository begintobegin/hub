<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/includes/config/config.php';
require "../databaseConnect.php";
require $_SERVER['DOCUMENT_ROOT'] . '/functions/Shortener/function.php';

if (isset($_POST)) {

    $longUrl = $_POST["longUrl"];
    validation($longUrl, $pdo, $config);
} else {
    $_SESSION['Request'] = "no isset";
    ShortenerLocation($config);
    
}

function generateUrl($url, $pdo, $config)
{
    $key = generatekey($url);
    if (uniqueShortKey($key, $pdo) > 0) {
        generateUrl($url, $pdo, $config);
    } else {

        $stmt = $pdo->prepare("INSERT INTO shortertable (shortkey,longurl,expiration_time) VALUES (:key,:url,:exptime)");
        $stmt->bindParam(":key", $key, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->bindParam(":exptime", time());
        try {
            $stmt->execute();
            $_SESSION['Request'] = $config['app']['serverurl'] . $key;
            ShortenerLocation($config);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
