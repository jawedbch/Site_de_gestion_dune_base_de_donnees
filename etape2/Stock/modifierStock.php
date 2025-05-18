<?php
session_start(); // Entretien de la session
require_once 'fonctions_stock.php';
$tab = $_SESSION['id'];

$stock = getStockById($tab[0], $tab[1]);

$stock['stock_quantite'] = $_POST['stock_quantite']; // Ce qu'on va passer en paramètre à updateStock()

echo "<!DOCTYPE html>\n"; // En cas de problème (ce qui théoriquement n'arrive jamais)

// Mettre à jour le stock
if(!empty(updateStock($stock))) { // Tout se passe bien
    header("Location: afficheStocks.php"); // Retour à l'envoyeur
    exit();
} else
    echo '<p><a href="afficheStocks.php">Retour</a></p>';

?>
