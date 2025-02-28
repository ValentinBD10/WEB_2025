<?php
    session_start();

    function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="compte.css" rel="stylesheet">
    <title>Création de compte</title>
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Création</h2>
            <form action="creation_server.php" method="post">

                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">

                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="date">Date de naissance :</label>
                <input type="date" id="date" name="date" required>

                <label for="adresse">Adresse postal :</label>
                <input type="text" id="adresse" name="adresse" required>

                <label for="telephone">Numéro de téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <button>Envoyer</button>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var referrer = document.referrer;

            if (referrer.includes("creation.html")) {
                alert("mail existant");
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>