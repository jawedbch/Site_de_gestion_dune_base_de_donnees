<?php
session_start();

require_once '../Magasin/fonctions_magasin.php';
require_once '../Capsule/fonctions_capsule.php';
require_once 'fonctions_stock.php';

// Vérifie que l'identifiant composite est fourni
if (!isset($_GET['id'])) {
    header("Location: afficheStocks.php");
    exit();
}

$tab = explode('*', $_GET['id']);
$stock = getStockById($tab[0], $tab[1]);

// Vérifie que le stock existe
if (!$stock) {
    header("Location: afficheStocks.php");
    exit();
}

$magasin = getMagasinById($stock['mag_id']);
$capsule = getCapsuleById($stock['cap_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du stock</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<!-- Boutons navigation -->
<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="afficheStocks.php" class="btn-retour">← Retour</a>

<h1>Détails du stock</h1>

<ul>
    <li><strong>Nom du magasin :</strong> <?= htmlspecialchars($magasin['mag_nom']) ?></li>
    <li><strong>Adresse du magasin :</strong> <?= htmlspecialchars($magasin['mag_adresse']) ?></li>
    <li><strong>Nom de la capsule :</strong> <?= htmlspecialchars($capsule['cap_nom']) ?></li>
    <li><strong>Intensité de la capsule :</strong> <?= htmlspecialchars($capsule['cap_intensite']) ?></li>
    <li><strong>Prix de la capsule :</strong> <?= htmlspecialchars($capsule['cap_prix']) ?> €</li>
    <li><strong>Quantité de capsules :</strong> <?= htmlspecialchars($stock['stock_quantite']) ?></li>
</ul>

</body>
</html>
