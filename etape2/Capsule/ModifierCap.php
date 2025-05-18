<?php
session_start();
require_once 'fonctions_capsule.php';

// Récupérer les valeurs des champs du formulaire
$id = $_SESSION['id'];
$cap_nom = $_POST['cap_nom'];
$cap_prix = $_POST['cap_prix'];
$cap_intensite = $_POST['cap_intensite'];

// Créer un tableau associatif représentant la capsule à mettre à jour
$capsule = array(
'cap_id' => $id,
'cap_nom' => $cap_nom,
'cap_prix' => $cap_prix,
'cap_intensite' => $cap_intensite
);

// Mettre à jour la capsule dans la base de données
if(!empty(updateCapsule($capsule))) {
  header("Location: afficheCapsules.php"); // Retour pour afficher la table
  exit();
}
?>
