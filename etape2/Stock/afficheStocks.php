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
    <title>Liste des stocks</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="../index.php" class="btn-retour">← Retour</a>
<h1>Liste des stocks</h1>
<form action="insertion_stock.php" method="get">
    <input type="submit" value="Insérer un nouveau stock">
</form>
<table border="1">
    <tr>
        <th>Nom du magasin</th>
        <th>Nom de la capsule</th>
        <th>Quantité</th>
        <th>Action</th>
    </tr>
    <?php
    error_reporting(-1);
    ini_set("display_errors", -1);
    require_once 'fonctions_stock.php';

    // Récupère tous les stocks depuis la base de données
    $stocks = getAllStocks();

    // Affiche chaque stock dans le tableau
    foreach ($stocks as $stock) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($stock['mag_nom']) . "</td>";
        echo "<td>" . htmlspecialchars($stock['cap_nom']) . "</td>";
        echo "<td>" . $stock['stock_quantite'] . "</td>";
        echo "<td>";
        echo "<form action='detailsStock.php' method='get'>";
        echo "<input type='hidden' name='id' value='" . $stock['cap_id'] ."*".$stock['mag_id']. "'>";
        echo "<input type='submit' value='Détail'>";
        echo "</form>";
        echo "<form action='modifierFormulaire.php' method='get'>";
        echo "<input type='hidden' name='id' value='" . $stock['cap_id'] ."*".$stock['mag_id']. "'>";
        echo "<input type='submit' value='Modifier'>";
        echo "</form>";
        echo "<form action='supprimerStock.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $stock['cap_id'] ."*".$stock['mag_id']. "'>";
        echo "<input type='submit' value='Supprimer'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
<br />
</table>
</body>
</html>
