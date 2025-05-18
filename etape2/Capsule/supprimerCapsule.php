<?php
session_start();
require_once 'fonctions_capsule.php';

$id = $_POST['id']; // Récupère l'identifiant de la capsule
deleteCapsule($id); // Supprime la capsule correspondante de la base de données
header("Location: afficheCapsules.php");
exit();
?>

