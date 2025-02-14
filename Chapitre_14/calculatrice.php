<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>
    <div class="interface">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Premier nombre</label>
            <br></br>
            <input type="text" name="premier">
            <br></br>
            <label>Operateur</label>
            <br></br>
            <input type="text" name="operateur">
            <br></br>
            <label>Deuxième nombre</label>
            <br></br>
            <input type="text" name="deuxieme">
            <button type="submit">Valider</button>
        </form>
    </div>
    <br></br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $premier = htmlspecialchars($_POST['premier']);
            $deuxieme = htmlspecialchars($_POST['deuxieme']);
            $operateur = htmlspecialchars($_POST['operateur']);
            function calculer($premier, $deuxieme, $operateur) {
                switch ($operateur) {
                    case '+':
                        return $premier + $deuxieme;
                    case '-':
                        return $premier - $deuxieme;
                    case '*':
                        return $premier * $deuxieme;
                    case '/':
                        if ($deuxieme != 0) {
                            return $premier / $deuxieme;
                        }
                            else {
                                return "Erreur : Division par zéro";
                            }
                    default:
                        return "Opérateur non valide";
                }
            }
            echo "La réponse est ",calculer($premier,$deuxieme,$operateur);
        }
    ?>
</body>
</html>