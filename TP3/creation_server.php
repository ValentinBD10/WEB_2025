<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Échec de la validation du jeton CSRF.');
    }

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    $NOM = $_POST["nom"];
    $PRENOM = $_POST["prenom"];
    $DATE = $_POST["date"];
    $ADRESSE = $_POST["adresse"];
    $TEL = $_POST["telephone"];
    $EMAIL = $_POST["email"];
    $PWD = password_hash($_POST["password"], PASSWORD_DEFAULT);

    require_once('config.php');
    $squery="select * from users";
    $where = mysqli_query($con,$squery);
    while($donnee=mysqli_fetch_assoc($where))
    {
        $BEMAIL = $donnee["email"];

        if($EMAIL == $BEMAIL)
        {
            header("Location: creation.php");
        }
    }

    try {
        require_once "dbh.php";
        
        $query = "INSERT INTO users (first_name, last_name, dob, address, phone, email, password) VALUES (?, ?, ?, ?, ?, ?, ?);";
    
        $stmt = $pdo->prepare($query);
    
        $stmt->execute([$NOM, $PRENOM, $DATE, $ADRESSE, $TEL, $EMAIL, $PWD]);
        
        $pdo = null;
    
        $stmt = null;
    
        header("Location: creation.php");
        die();
    }
    catch (PDOException $e) {
        die("Query failed : " . $e->getMessage());
    }
}
else{
    header("Location: creation.php");
}
?>