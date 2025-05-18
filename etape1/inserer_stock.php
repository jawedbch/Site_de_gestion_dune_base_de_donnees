<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertion Stock</title>
</head>
<body>

<?php
require 'fonctions_stock.php';

print_r(insertStock(array(
    'mag_id' => $_GET['magasin_id'],
    'cap_id' => $_GET['capsule_id'],
    'stock_quantite' => $_GET['stock_quantite']
)));

echo "<br /> a bien été inséré !";
?>

</body>
</html>
