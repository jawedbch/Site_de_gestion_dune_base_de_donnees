<?php
session_start();
require_once 'fonctions_magasin.php';

$id = $_POST['id']; //Récuperer l'id passé dans l'url

// Transmettre l'identifiant de la capsule à l'aide d'une variable de session
$_SESSION['id'] = $id;

// Récupérer les informations du magasin à modifier
$magasin = getMagasinById($id);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un magasin</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="./afficheMagasins.php" class="btn-retour">← Retour</a>
<h1>Modifier un magasin</h1>
<form action="modifierMag.php" method="post">
    <label for="mag_nom">Nouveau nom :</label>
    <input type="text" id="mag_nom" name="mag_nom" value="<?php echo $magasin['mag_nom']; ?>" size="50" required /><br /><br />
    <label for="mag_adresse">Nouvelle adresse :</label>
    <input type="text" id="mag_adresse" name="mag_adresse" value="<?php echo $magasin['mag_adresse']; ?>" size="100" required /><br /><br />
    <input type="submit"  name="submit" value="Modifier" />
    <input type="reset" name="reset" value="Effacer" />
</form>
</body>
</html>
