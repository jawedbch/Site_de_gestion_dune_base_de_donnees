<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertion Magasin</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>

<?php
require 'fonctions_magasin.php';
if(!empty($mag = insertMagasin(array('mag_nom' => $_POST['nom'], 'mag_adresse' => $_POST['adresse'])))) {
    echo "<br />Le magasin a bien été inséré !";

} else echo '<br />';

echo "<p><a href='afficheMagasins.php'>Retour</a></p>";
?>

</body>
</html>
