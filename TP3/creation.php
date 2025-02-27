<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
            header("Location: creation.html");
        }
    }

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