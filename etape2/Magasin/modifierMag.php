<?php
session_start();
require_once 'fonctions_magasin.php';

// Vérifie si le formulaire de modification a été soumis
    // Récupérer les valeurs des champs du formulaire
    $id = $_SESSION['id'];
    $mag_nom = $_POST['mag_nom'];
    $mag_adresse = $_POST['mag_adresse'];

    // Créer un tableau associatif représentant le magasin à mettre à jour
    $magasin = array(
        'mag_id' => $id,
        'mag_nom' => $mag_nom,
        'mag_adresse' => $mag_adresse,
    );

    echo "<!DOCTYPE html>\n";

    // Mettre à jour le magasin dans la base de données
    if(!empty(updateMagasin($magasin))) {
        header("Location: afficheMagasins.php"); // Retour à l'envoyeur
        exit();
    }
?>
