<?php
session_start(); // Entretien de la session
require_once 'fonctions_stock.php';

$tab = explode('*', $_GET['id']);

// Récupérer les informations du stock à modifier
$stock = getStockById($tab[0], $tab[1]);

// Pour transmettre l'identifiant au traitement du formulaire
$_SESSION['id'] = $tab;

// Les noms attribués aux boutons radio n'importent pas
echo '<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un stock</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <a href="../index.php" class="btn-accueil">🏠 Accueil</a>
    <a href="../index.php" class="btn-retour">← Retour</a>
    <h1>Modifier un stock</h1>
    <form action="modifierStock.php" method="post">
      <p> <b>Nom de la capsule : '.$stock['cap_nom'].'</b> <input type="radio" name="nom1" checked /> </p> 
      <p> <b>Nom du magasin : '.$stock['mag_nom'].'</b> <input type="radio" name="nom2" checked /> </p>
      <p> <b>Quantité de capsules : </b> <input type="number" min="1" name="stock_quantite" value="'. $stock['stock_quantite'] . '" size="5" /> </p>
      <input type="submit" name="submit" value="Modifier" />
      <input type="reset" name="reset" value="Effacer" />
    </form>
</body>
</html>';
?>
