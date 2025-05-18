<?php
// Configuration de la connexion à la base de données

// Fonction pour établir la connexion à la base de données
function connexion() {
  $db_host = '172.16.20.14'; // Adresse du serveur de base de données
  $db_name = 'bm223414'; // Nom de la base de données
  $db_user = 'bm223414'; // Nom d'utilisateur de la base de données
  $db_pass = '20223414'; // Mot de passe de la base de données
    $conn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_pass");
    if (!$conn) {
        echo "Erreur : Échec de la connexion à la base de données!";
        exit;
    }
    return $conn;
}
?>
