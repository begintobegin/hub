<?php
function validationEmail($email,$pdo) {

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) <= 100) {   
        return true;
    }else{
        echo "incorrect email";
        exit;
    }
}

function isValidPassword($password,$passwordRepeat) {
   if($password != $passwordRepeat ){
    echo "пароли не совпадают";
    exit;
   }
}

function validationUserName($username,$pdo){
    if(strlen($username) <= 50 && isUserNameUnique($username,$pdo)){
        return true;
    }else{
        echo "incorrect username";
        exit;
    }

}

function isFieldEmpty($data) {
    for($i = 0; $i <= $data.lenght(); $i++){

    }
  
//    if(isset($value) || trim($value) === ''){
//     return true;
//    }else{
//     echo "empty"; 
//     exit;
//    }
}

function Registration($data,$pdo){
    $email = $data["email"];
    $salt = bin2hex(random_bytes(16));
    $password = hash('sha256', $salt . $data["password"]);
    $username = $data["username"];
    
    $stmt = $pdo->prepare("INSERT INTO users (username, email,password_hash,salt,created_at) VALUES (:username,:email,:password_hash,:salt,:created_at)");
    $stmt->bindParam(":username",$username,PDO::PARAM_STR);
    $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    $stmt->bindParam(":password_hash",$password,PDO::PARAM_STR);
    $stmt->bindParam(":salt",$salt,PDO::PARAM_STR);
    $stmt->bindParam(":created_at", date('Y-m-d H:i:s'));
    try{
        $stmt->execute();

    }catch(PDOException $e){
        echo "Ошибка" . $e->getMessage();
    }
}  

function Login($data,$pdo){
    $email = $data["email"];
    $password  =$data["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $salt = $user['salt'];
        $storedHash = $user['password_hash'];

        $passwordHash = hash('sha256', $salt . $data["password"]);

        if ($passwordHash === $storedHash) {
            
            echo "Добро пожаловать!";
        } else {
         
            echo "<pre>";
           echo $storedHash;
           echo "       ";
           echo  $passwordHash;
            echo "</pre>";
        }
    }else{
        echo "Нет такого пользоватея";
    }
}

function isEmailUnique($email,$pdo){
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    
    $stmt->execute();

    $count = $stmt->fetchColumn();
    if($count == 0){
        return true;
    }else{
        echo "email not unique";
        exit;
    }
}

function isUserNameUnique($username,$pdo){
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username",$username,PDO::PARAM_STR);
    
    $stmt->execute();

    $count = $stmt->fetchColumn();
    return $count == 0;
}