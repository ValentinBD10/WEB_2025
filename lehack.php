<?php
$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");

// Récupération d’un utilisateur sans protection
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id"; // ⚠️ Vulnérable !
    $stmt = $pdo->query($query);
    $user = $stmt->fetch();
    print_r($user);
}
?>