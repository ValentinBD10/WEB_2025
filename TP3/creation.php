<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $NOM = $_POST["nom"];
    $PRENOM = $_POST["prenom"];
    $DATE = $_POST["date"];
    $ADRESSE = $_POST["adresse"];
    $TEL = $_POST["telephone"];
    $EMAIL = $_POST["email"];
    $PWD = $_POST["password"];

    try {
        require_once "dbh.php";
        
        $query = "INSERT INTO users (first_name, last_name, dob, address, phone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
    
        $stmt = $pdo->prepare($query);
    
        $stmt->execute([$NOM, $PRENOM, $DATE, $ADRESSE, $TEL, $EMAIL, $PWD]);
        
        $pdo = null;
    
        $stmt = null;
    
        header("Location: creation.html");
        die();
    }
    catch (PDOException $e) {
        die("Query failed : " . $e->getMessage());
    }
}
else{
    header("Location: creation.html");
}
?>