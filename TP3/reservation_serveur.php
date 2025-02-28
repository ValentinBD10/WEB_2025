<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        try {
            require_once "dbh.php";
            
            $query = "INSERT INTO user_data (user_id, date, heure) VALUES (?, ?, ?);";
        
            $stmt = $pdo->prepare($query);
        
            $stmt->execute([$_SESSION['user'], $_POST['date'], $_POST['heure']]);
            
            $pdo = null;
        
            $stmt = null;
        
            header("Location: mesrdv.php");
            die();
        }
        catch (PDOException $e) {
            die("Query failed : " . $e->getMessage());
        }
    }
?>