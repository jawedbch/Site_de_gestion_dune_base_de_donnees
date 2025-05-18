<?php
require 'fonctions_stock.php';

/* Test de getAllStocks() */
echo "Test de getAllStocks() :<pre>";
print_r(getAllStocks());
echo "</pre>";

/* Test de getStockById() */
echo "Test de getStockById() :<br />";
print_r(getStockById(10, 53));
echo "<pre>";
print_r(getStockById(10, 53));
echo "</pre>";

/* Test de insertStock() */

echo "Test de insertStock() :<br />";

// Données de test
$test_data = array(
    'mag_id' => 98,      // ID du magasin (changer à un ID existant dans g11_magasin)
    'cap_id' => 14,      // ID de la capsule (changer à un ID existant dans g11_capsule)
    'stock_quantite' => 20 // Quantité en stock
);

// Appel de la fonction insertStock
$resultat = insertStock($test_data);

// Vérification si l'insertion a réussi
if (empty($resultat)) {
    echo "Erreur : L'insertion a échoué.<br />";
} else {
    echo "Insertion réussie ! Voici les données insérées :<br />";
    echo "<pre>";
    print_r($resultat);
    echo "</pre>";
}


/* Test de updateStock() */
echo "Test de updateStock() :<br />";
updateStock(array(
    // Mettre des IDs qui existent dans la bse de données (cap_id, mag_id)
    'mag_id' => 2, 
    'cap_id' => 2, 
    'stock_quantite' => 20
));
echo "<br />";

/* Test de deleteStock() */
echo "Test de deleteStock() :<pre>";
deleteStock(14, 3); // Mettre des IDs qui existent dans la bse de données
echo "</pre>";

?>
