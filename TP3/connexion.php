<?php
require_once('config.php');
$squery="select * from users";
$where = mysqli_query($con,$squery);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    while($donnee=mysqli_fetch_assoc($where))
    {
        $UEMAIL = $_POST["email"];
        $BEMAIL = $donnee["email"];

        if($UEMAIL == $BEMAIL)
        {
            $PWD = $_POST["password"];
            $HASH = $donnee["pwd"];
            
            if (password_verify($PWD, $HASH)){
                header("Location: mesrdv.html");
            }
            else{
                header("Location: connexion.html");
            }
        }
        else{
            header("Location: connexion.html");
        }
    }
}
else{
    header("Location: connexion.html");
}
?>