<?php
require_once('db_connection.php');

// Fonction pour recuperer un magasin par son id
function getMagasinById(int $id) : array {
    $ptrDB = connexion();

    $ptrQuery = pg_query($ptrDB, "SELECT * FROM g11_magasin WHERE mag_id = $id");
    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat ? $resultat : []; // Vérifie si $resultat est null ou non avec un operateur ternaire
}

// Fonction pour recuperer tous les magasins
function getAllMagasins() : array {
    $ptrDB = connexion();

    $ptrQuery = pg_query($ptrDB, "SELECT * FROM g11_magasin");
    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = [];
    while ($row = pg_fetch_assoc($ptrQuery)) {
        $resultat[] = $row;
    }
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat;
}

// Fonction pour inserer un magasin
function insertMagasin($magasin) : array {
    $ptrDB = connexion();

    // Échapper les données pour éviter les injections SQL
    $mag_nom = pg_escape_literal($ptrDB, $magasin['mag_nom']);
    $mag_adresse = pg_escape_literal($ptrDB, $magasin['mag_adresse']);

    // Vérifier si un magasin avec ce nom existe déjà
    $query_check = "SELECT * FROM g11_magasin WHERE mag_nom = $mag_nom";
    $result_check = pg_query($ptrDB, $query_check);

    if (pg_num_rows($result_check) > 0) {
        echo "Erreur : Un magasin avec ce nom existe déjà.";
        pg_free_result($result_check);
        pg_close($ptrDB);
        return [];
    }

    // Insertion du magasin
    $query = "INSERT INTO g11_magasin (mag_nom, mag_adresse) VALUES ($mag_nom, $mag_adresse) RETURNING *";
    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_free_result($ptrQuery);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat;
}

// Fonction pour mettre a jour un magasin
function updateMagasin(array $magasin) : array {
    $ptrDB = connexion();

    // Préparer les valeurs
    $mag_id = $magasin['mag_id'];
    $mag_nom = pg_escape_literal($ptrDB, $magasin['mag_nom']);
    $mag_adresse = pg_escape_literal($ptrDB, $magasin['mag_adresse']);

    // Construire la requête de mise à jour
    $query = "UPDATE g11_magasin SET mag_nom = $mag_nom, mag_adresse = $mag_adresse WHERE mag_id = $mag_id RETURNING *";
    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return []; // Retourner un tableau vide en cas d'échec
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    
    if ($resultat) {
        return $resultat; // Si l'update a réussi, renvoyer les données mises à jour
    } else {
        return []; // Retourner un tableau vide en cas d'échec
    }
}

// Fonction pour supprimer un magasin
function deleteMagasin(int $id) : void {
    $ptrDB = connexion();

    $query = "DELETE FROM g11_magasin WHERE mag_id = $id";

    $suppression = pg_query($ptrDB, $query);

    if (!$suppression) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
    } else {
        echo "Enregistrement supprimé !";
    }

    pg_close($ptrDB);
}
?>
