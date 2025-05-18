<?php
require_once('db_connection.php');

// Fonction pour recuperer un stock par id
function getStockById(int $cap_id, $mag_id) : array {
    $ptrDB = connexion();

    $ptrQuery = pg_query($ptrDB, "
        SELECT s.cap_id, s.mag_id, s.stock_quantite, c.cap_nom, m.mag_nom
        FROM g11_stocke s
        JOIN g11_capsule c ON s.cap_id = c.cap_id
        JOIN g11_magasin m ON s.mag_id = m.mag_id
        WHERE s.cap_id = $cap_id AND s.mag_id = $mag_id
    ");

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resultat ? $resultat : [];
}

// fonction pour recuperer tous les stocks
function getAllStocks() : array {
    $ptrDB = connexion();

    // Pour plus d'informations...
    $ptrQuery = pg_query($ptrDB, "SELECT s.cap_id, s.mag_id, c.cap_nom, m.mag_nom, s.stock_quantite 
                                        FROM g11_stocke s
                                        JOIN g11_capsule c ON s.cap_id = c.cap_id
                                        JOIN g11_magasin m ON s.mag_id = m.mag_id
                                        ;
");
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

// Fonction pour inserer un stock
function insertStock($stock) : array {
    $ptrDB = connexion();

    if (empty($stock['stock_quantite']) && $stock['stock_quantite'] !== '0') {
    echo 'Erreur : la quantité en stock est vide ou non définie.';
    return [];
    }


    $cap_id_escaped = $stock['cap_id'];
    $mag_id_escaped = $stock['mag_id'];
    $stock_quantite_escaped = $stock['stock_quantite'];

    $query = "INSERT INTO g11_stocke (cap_id, mag_id, stock_quantite) 
              VALUES ($cap_id_escaped, $mag_id_escaped, $stock_quantite_escaped)";

    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    pg_close($ptrDB);
    return array('cap_id' => $cap_id_escaped, 'mag_id' => $mag_id_escaped, 'stock_quantite' => $stock_quantite_escaped);
}

// Fonction pour mettre a jour un stock
function updateStock(array $stock) : array { // Tous les attributs du stock passé en paramètre sont "obligatoires"
    $ptrDB = connexion();

    // Il est important de noter que le seul attribut à modifier est : stock_quantite 

    // Pour identifier le stock
    $cap_id = $stock['cap_id'];
    $mag_id = $stock['mag_id'];
    $stock_quantite = $stock['stock_quantite'];
    if (!isset($stock['stock_quantite'])) {
    echo 'Erreur : stock_quantite est manquant.';
    return [];
}


    $query = "UPDATE g11_stocke SET stock_quantite = $stock_quantite WHERE cap_id = $cap_id AND mag_id = $mag_id RETURNING *";

    $ptrQuery = pg_query($ptrDB, $query);

    if (!$ptrQuery) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        pg_close($ptrDB);
        return [];
    }

    $resultat = pg_fetch_assoc($ptrQuery);
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    var_dump($stock);

    return $resultat ? $resultat : [];
}

// Fonction pour supprimmer un stock
function deleteStock(int $cap_id, int $mag_id) : bool {
    $ptrDB = connexion();

    $query = "DELETE FROM g11_stocke WHERE cap_id = $cap_id AND mag_id = $mag_id";

    $suppression = pg_query($ptrDB, $query);

    if (!$suppression) {
        echo 'Erreur : ' . pg_last_error($ptrDB);
        return false;
    }
    
    pg_close($ptrDB);
    return true;
}

?>
