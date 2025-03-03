<?php
include('Database.php');
include('Personne.php');

// Traitement des actions CRUD
$personne = new Personne();

if (isset($_POST['create'])) {
    $nom = $_POST['nom'];
    $personne->create($nom);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $personne->delete($id);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $personne->update($id, $nom);
}

// Récupérer la liste des personnes
$personnes = $personne->read();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Personnes</title>
</head>
<body>
    <h1>Gestion des personnes</h1>

    <!-- Formulaire d'ajout -->
    <form method="POST">
        <input type="text" name="nom" required placeholder="Nom">
        <button type="submit" name="create">Ajouter</button>
    </form>

    <h2>Liste des personnes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($personnes as $personne) { ?>
        <tr>
            <td><?php echo $personne['id']; ?></td>
            <td><?php echo $personne['nom']; ?></td>
            <td>
                <a href="?delete=<?php echo $personne['id']; ?>">Supprimer</a>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $personne['id']; ?>">
                    <input type="text" name="nom" value="<?php echo $personne['nom']; ?>" required>
                    <button type="submit" name="update">Mettre à jour</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
