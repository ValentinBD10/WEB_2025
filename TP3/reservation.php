<?php
    session_start();
    
    try {
        require_once "dbh.php";
        
        $query = "INSERT INTO user_data (user_id, date, heure) VALUES (?, ?, ?);";
    
        $stmt = $pdo->prepare($query);
    
        $stmt->execute([$_SESSION['user'], $_SESSION['date'], "20:00"]);
        
        $pdo = null;
    
        $stmt = null;
    
        header("Location: mesrdv.php");
        die();
    }
    catch (PDOException $e) {
        die("Query failed : " . $e->getMessage());
    }
?>