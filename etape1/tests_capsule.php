<?php
require 'fonctions_capsule.php';

/* Test de getCapsuleById() */
echo "Test de getCapsuleById() :<br />";
echo "Test avec l'ID 1 :<pre>";
print_r(getCapsuleById(1));
echo "</pre>";

/* Test de insertCapsule() */
echo "Test de insertCapsule() :<pre>";
$nouvelle_capsule = array(
    'cap_nom' => 'Nouvelle Capsule 1',
    'cap_prix' => 2.50,
    'cap_intensite' => 6
);
print_r(insertCapsule($nouvelle_capsule));
echo "</pre>";

/* Test de updateCapsule() */
echo "Test de updateCapsule() :<pre>";
$capsule_a_modifier = getCapsuleById(179); // Mettre un id qui existe
$capsule_a_modifier['cap_nom'] = 'Capsule Modifiée 2';
$capsule_a_modifier['cap_prix'] = 3.00;
$capsule_a_modifier['cap_intensite'] = 8;
print_r(updateCapsule($capsule_a_modifier));
echo "</pre>";

/* Test de deleteCapsule() */
echo "Test de deleteCapsule() :<pre>";
deleteCapsule(178); // Mettre un id qui existe dans la table g11_capsule
echo "</pre>";
echo "<br />";

/* Test de getAllCapsules() */
echo "Test de getAllCapsules() :<pre>";
print_r(getAllCapsules());
echo "</pre>";

?>
