<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/includes/databaseConnect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/functions/Shortener/function.php";
$token = isset($_GET['token']) ? $_GET['token'] : '';

if (empty($token)) {
    echo "Некорректный токен.";
    exit;
}

$sql = "SELECT longurl,expiration_time FROM shortertable WHERE shortkey = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$stmt->execute();


$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    if($result['expiration_time'] > time() + $config['app']['expirationTime']){
        $originalUrl = $result['longurl'];
        header("Location: $originalUrl");
        exit;
    }else{
        $_SESSION['Request'] = "This link has expired";
        ShortenerLocation($config);
    }
   
} else {
    $_SESSION['Request'] = "this link not found";
    ShortenerLocation($config);
}
