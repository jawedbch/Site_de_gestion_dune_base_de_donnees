<?php
session_start();
require_once 'fonctions_stock.php';

echo "<!DOCTYPE html>\n";

// Supprime le stock correspondant de la base de données
$tab = explode('*', $_POST['id']);
if (deleteStock($tab[0], $tab[1]))
echo "<br />";
header("Location: afficheStocks.php");
exit();
?>
