<?php

require_once('db_connection.php');

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
    return $resultat;
}

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

function insertMagasin(array $magasin) : array {
    $ptrDB = connexion();

    $mag_nom = pg_escape_literal($ptrDB, $magasin['mag_nom']);
    $mag_adresse = pg_escape_literal($ptrDB, $magasin['mag_adresse']);

    $query = "INSERT INTO g11_magasin (mag_nom, mag_adresse) VALUES ($mag_nom, $mag_adresse) RETURNING *";

    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat;
}

function updateMagasin(array $magasin) : array {
    $ptrDB = connexion();

    $mag_id = pg_escape_literal($ptrDB, $magasin['mag_id']);
    $mag_nom = pg_escape_literal($ptrDB, $magasin['mag_nom']);
    $mag_adresse = pg_escape_literal($ptrDB, $magasin['mag_adresse']);

    $query = "UPDATE g11_magasin SET mag_nom = $mag_nom, mag_adresse = $mag_adresse WHERE mag_id = $mag_id RETURNING *";

    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat;
}

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
