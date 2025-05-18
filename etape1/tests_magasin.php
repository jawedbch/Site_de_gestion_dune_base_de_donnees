<?php
require 'fonctions_magasin.php';

/* Test de getAllMagasins() */
echo "Test de getAllMagasins() :<pre>";
print_r(getAllMagasins());
echo "</pre>";


/* Test de getMagasinById() */
echo "Test de getMagasinById() :<pre>";
print_r(getMagasinById(99));
echo "<br />";
print_r(getMagasinById(98));
echo "</pre>";

/* Test de insertMagasin() */
echo "Test de insertMagasin() :<pre>";

// Insertion d'un magasin avec un nouveau nom et une nouvelle adresse
print_r(insertMagasin(array('mag_nom' => 'Nouveau Magagsin 105', 'mag_adresse' => '105 Rue des Bois')));
echo "</pre>";

echo "<br />";

/* Test de updateMagasin() */
echo "Test de updateMagasin() :<pre>";

// Mise à jour d'un magasin avec l'ID 2
print_r(updateMagasin(array('mag_id' => 46, 'mag_nom' => 'Magasin Mis à Jour', 'mag_adresse' => '1234 Avenue du Parc 222')));
echo "</pre>";

/* Test de deleteMagasin() */
echo "Test de deleteMagasin() :<pre>";
deleteMagasin(72);
echo "</pre>";

?>
