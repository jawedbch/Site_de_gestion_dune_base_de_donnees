<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion d'un magasin</title>
</head>
<body>

<?php
require 'fonctions_magasin.php';

// Vérification des données envoyées depuis le formulaire
if(isset($_GET['nom']) && isset($_GET['adresse'])) {
    // Appel de la fonction pour insérer un nouveau magasin dans la base de données
    $magasin_insere = insertMagasin(array(
        'mag_nom' => $_GET['nom'],
        'mag_adresse' => $_GET['adresse']
    ));

    // Affichage d'un message pour indiquer que l'insertion a réussi
    echo "Le magasin a bien été inséré !";

    // Affichage de la table magasin après l'insertion
    echo "<br />Voici la table Magasin suite à l'insertion :<br />";
    foreach (getAllMagasins() as $magasin) {
        print_r($magasin);
        echo "<br />";
    }
} else {
    // Affichage d'un message d'erreur si des données requises sont manquantes
    echo "Erreur : Veuillez remplir tous les champs du formulaire.";
}
?>

</body>
</html>
