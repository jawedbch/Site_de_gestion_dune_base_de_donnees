<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion d'une capsule</title>
</head>
<body>

<?php
require 'fonctions_capsule.php'; // Correction du nom du fichier des fonctions

// Vérification des données envoyées depuis le formulaire
if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['intensite'])) {
    // Appel de la fonction pour insérer une nouvelle capsule dans la base de données
    $capsule_inseree = insertCapsule(array(
        'cap_nom' => $_POST['nom'],
        'cap_prix' => $_POST['prix'],
        'cap_intensite' => $_POST['intensite']
    ));

    // Affichage d'un message pour indiquer que l'insertion a réussi
    echo "La capsule a bien été insérée !";

    // Affichage de la table capsules après l'insertion
    echo "<br />Voici la table Capsules suite à l'insertion :<br />";
    foreach (getAllCapsules() as $capsule) {
        print_r($capsule);
        echo "<br />";
    }
} else {
    // Affichage d'un message d'erreur si des données requises sont manquantes
    echo "Erreur : Veuillez remplir tous les champs du formulaire.";
}
?>

</body>
</html>
