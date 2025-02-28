<?php
session_start();
require_once('config.php');
$squery="select * from users";
$where = mysqli_query($con,$squery);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Échec de la validation du jeton CSRF.');
    }

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    
    while($donnee=mysqli_fetch_assoc($where))
    {
        $UEMAIL = $_POST["email"];
        $BEMAIL = $donnee["email"];

        if($UEMAIL == $BEMAIL)
        {
            $PWD = $_POST["password"];
            $HASH = $donnee["password"];
            
            if (password_verify($PWD, $HASH)){
                $_SESSION['user'] = $donnee["user_id"];
                header("Location: mesrdv.php");
            }
            else{
                header("Location: connexion.php");
            }
        }
        else{
            header("Location: connexion.php");
        }
    }
}
else{
    header("Location: connexion.php");
}
?>