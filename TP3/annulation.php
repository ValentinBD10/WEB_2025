<?php
    try {
        require_once "dbh.php";
        
        $query = "DELETE FROM user_data WHERE user_id=$USER;";

        $stmt = $pdo->prepare($query);

        $stmt->execute();
        
        $pdo = null;

        $stmt = null;

        header("Location: creation.html");
        die();
    }
    catch (PDOException $e) {
        die("Query failed : " . $e->getMessage());
    }
?>