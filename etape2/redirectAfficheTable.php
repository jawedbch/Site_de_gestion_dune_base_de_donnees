<?php
session_start();

if (isset($_POST['table'])) {
    $table = $_POST['table'];
    $_SESSION['table_choisie'] = $table; // Stockage dans la session

    switch($table) {
        case 'capsules':
            header("Location: Capsule/afficheCapsules.php");
            exit();
        case 'magasins':
            header("Location: Magasin/afficheMagasins.php");
            exit();
        case 'stocks':
            header("Location: Stock/afficheStocks.php");
            exit();
        default:
            // Redirection par défaut en cas de valeur invalide
            header("Location: index.php");
            exit();
    }
} else {
    // Redirection si aucun choix n’a été fait
    header("Location: index.php");
    exit();
}
