<?php
session_start();
require_once 'fonctions_magasin.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    deleteMagasin($id);
}

header("Location: afficheMagasins.php");
exit();
?>
