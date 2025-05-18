<?php
session_start();
if (isset($_SESSION['table_choisie'])) {
    $table = $_SESSION['table_choisie'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des magasins</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="../index.php" class="btn-retour">← Retour</a>
<h1>Liste des magasins</h1>
<form action="insertion_magasin.php" method="post">
    <input type="submit" value="Insérer un nouveau magasin">
</form>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Action</th>
    </tr>
    <?php
    error_reporting(-1);
    ini_set("display_errors", -1);
    require_once 'fonctions_magasin.php';

    // Récupère tous les magasins depuis la base de données
    $magasins = getAllMagasins();

    // Affiche chaque magasin dans le tableau
    foreach ($magasins as $magasin) {
        echo "<tr>";
        echo "<td>" . $magasin['mag_id'] . "</td>";
        echo "<td>" . $magasin['mag_nom'] . "</td>";
        echo "<td>" . $magasin['mag_adresse'] . "</td>";
        echo "<td>";

        echo "<form action='detailsMagasin.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $magasin['mag_id'] . "'>";
        echo "<input type='submit' value='Détail'>";
        echo "</form>";

        echo "<form action='modifierFormulaire.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $magasin['mag_id'] . "'>";
        echo "<input type='submit' value='Modifier'>";
        echo "</form>";

        echo "<form action='supprimerMagasin.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $magasin['mag_id'] . "'>";
        echo "<input type='submit' value='Supprimer'>";
        echo "</form>";

        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
