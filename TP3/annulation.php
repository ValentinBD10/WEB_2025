<?php
    session_start();
    $USER = $_SESSION['user'];
    $ID = $_GET['id'];
    echo $ID;
    if(isset($_GET['id']))
    {
        try {
            require_once "dbh.php";
            
            $query = "DELETE FROM user_data WHERE user_id = $USER AND data_id = $ID;";

            $stmt = $pdo->prepare($query);

            $stmt->execute();
            
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