<?php

require_once('db_connection.php');

function getAllCapsules() : array {
    $ptrDB = connexion();

    $ptrQuery = pg_query($ptrDB, "SELECT * FROM g11_capsule");
    if (!$ptrQuery) {
        echo 'Erreur : '.pg_last_error($ptrDB);
        pg_free_result($ptrQuery);
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


function getCapsuleById(int $id) : array {
    $ptrDB = connexion();

    $ptrQuery = pg_query($ptrDB, "SELECT * FROM g11_capsule WHERE cap_id = $id");
    if (!$ptrQuery) {
        echo 'Erreur : '.pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat;
}


function insertCapsule(array $capsule) : array {
    $ptrDB = connexion();

    // Préparation des valeurs à insérer dans la requête
    $cap_nom = pg_escape_literal($ptrDB, $capsule['cap_nom']);
    $cap_prix = pg_escape_literal($ptrDB, $capsule['cap_prix']);
    $cap_intensite = pg_escape_literal($ptrDB, $capsule['cap_intensite']);

    // Construction de la requête INSERT
    $query = "INSERT INTO g11_capsule (cap_nom, cap_prix, cap_intensite) VALUES ($cap_nom, $cap_prix, $cap_intensite) RETURNING *";

    // Exécution de la requête
    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        // Vérification de l'erreur
        $error_message = pg_last_error($ptrDB);
        echo 'Erreur : ' . $error_message;

        // Libération des ressources et fermeture de la connexion
        pg_close($ptrDB);
        return [];
    }

    // Récupération de la nouvelle capsule insérée
    $resultat = pg_fetch_assoc($ptrQuery);

    // Libération des ressources et fermeture de la connexion
    pg_free_result($ptrQuery);
    pg_close($ptrDB);

    return $resultat;
}

function updateCapsule(array $capsule) : array {
    $ptrDB = connexion();

    $un = ""; $premier = true;
    $i = 0;
    $tabParams = array();

    foreach ($capsule as $key => $value) {
        if($key != "cap_id") {
            if($premier) {
                $un .= $key.'=$'.++$i;
                $premier = !$premier;
            } else
                $un .= ",".$key.'=$'.++$i;
            $tabParams[] = $value;
        }
    }

    $un .= " WHERE cap_id=".$capsule["cap_id"];

    pg_prepare($ptrDB, "reqPrepModification", "UPDATE g11_capsule SET $un");
    $ptrQuery = pg_execute($ptrDB, "reqPrepModification", $tabParams);

    if(!$ptrQuery) {
        echo 'Error : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }
    
    pg_free_result($ptrQuery);
    pg_close($ptrDB);

    return getCapsuleById($capsule['cap_id']);
}

function deleteCapsule(int $id) : void {
    $ptrDB = connexion();

    $suppression = pg_query($ptrDB, "DELETE FROM g11_capsule WHERE cap_id = $id");

    if (!$suppression) {
        echo 'Erreur : '.pg_last_error($ptrDB);
    } else {
        echo "Enregistrement supprimé !";
        pg_free_result($suppression);
    }

    pg_close($ptrDB);
}
?>
