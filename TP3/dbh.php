<?php

$dsn = "mysql:host=localhost;dbname=calendrier";
$dbusername = "root";
$dbpassword = "";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection complete"; 
    
} catch (PDOExcpetion $e) {
    echo "Connection failed : " . $e->getMessage();
}
?>