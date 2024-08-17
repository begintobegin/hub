<?php
function validation($url, $pdo, $config)
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        uniqueUrl($url, $pdo, $config);
    } else {
        $_SESSION['Request'] = "url invalid";
        ShortenerLocation($config);
        
    }
}
function generatekey($url)
{
    return $shortKey = substr(md5($url), 0, 6);
}
function uniqueShortKey($key, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM shortertable WHERE shortkey = :key");
    $stmt->bindParam(":key", $key, PDO::PARAM_STR);
    $stmt->execute();
    return $rowCount = $stmt->rowCount();
}
function uniqueUrl($url, $pdo, $config)
{
    $stmt = $pdo->prepare("SELECT * FROM shortertable WHERE longurl = :url");
    $stmt->bindParam(":url", $url, PDO::PARAM_STR);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['Request'] = $config['app']['serverurl'] . $row['shortkey'];
        ShortenerLocation($config);
        
    } else {
        generateUrl($url, $pdo, $config);
    }
}

function ShortenerLocation($config){
    header("Location: ". $config['app']['serverurl'] . "ShortenerPage.php");
    exit;
}