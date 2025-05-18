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
    <title>Liste des capsules</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <a href="../index.php" class="btn-accueil">🏠 Accueil</a>
    <a href="../index.php" class="btn-retour">← Retour</a>
    <h1>Liste des capsules</h1>
    <form action="insertion_capsule.php" method="get">
        <input type="submit" value="Insérer une nouvelle capsule">
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Intensité</th>
            <th>Action</th>
        </tr>
        <?php
        error_reporting(-1); // Active le signalement de toutes les erreurs
        ini_set("display_errors", -1); // Affiche les erreurs à l'écran
        require_once 'fonctions_capsule.php';

        // Récupère toutes les capsules depuis la base de données
        $capsules = getAllCapsules();

        // Affiche chaque capsule dans le tableau
        foreach ($capsules as $capsule) {
            echo "<tr>";
            echo "<td>" . $capsule['cap_id'] . "</td>";
            echo "<td>" . $capsule['cap_nom'] . "</td>";
            echo "<td>" . $capsule['cap_prix'] . "</td>";
            echo "<td>" . $capsule['cap_intensite'] . "</td>";
            echo "<td>";
            echo "<form action='detailsCapsule.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $capsule['cap_id'] . "'>";
            echo "<input type='submit' value='Détail'>";
            echo "</form>";
            echo "<form action='modifierFormulaire.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $capsule['cap_id'] . "'>";
            echo "<input type='submit' value='Modifier'>";
            echo "</form>";
            echo "<form action='supprimerCapsule.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $capsule['cap_id'] . "'>";
            echo "<input type='submit' value='Supprimer'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
