<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion d'une capsule</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php

require 'fonctions_capsule.php';

// Appel de la fonction pour insérer une nouvelle capsule dans la base de données
if(!empty($cap = insertCapsule(array(
    'cap_nom' => $_POST['nom'],
    'cap_prix' => $_POST['prix'],
    'cap_intensite' => $_POST['intensite']
))))

// Affichage de la table capsules après l'insertion
header("Location: afficheCapsules.php");
?>
</body>
</html>
