<?php
session_start();
require 'fonctions_stock.php';

// Récupération des données du formulaire
$id_capsule = $_POST['capsule_id'];
$id_magasin = $_POST['magasin_id'];
$stock_quantite = $_POST['stock_quantite'];

// Insertion du stock
$tableauStock = insertStock(array(
    'mag_id' => $id_magasin,
    'cap_id' => $id_capsule,
    'stock_quantite' => $stock_quantite
));

// Redirection si insertion réussie
if (!empty($tableauStock)) {
    header("Location: afficheStocks.php");
    exit();
} else {
    // En cas d'erreur, afficher un message (dans une vraie app, tu pourrais rediriger vers une page d'erreur aussi)
    echo "Erreur lors de l'insertion du stock.";
    echo "<br><a href='afficheStocks.php'>Retour</a>";
}
?>
