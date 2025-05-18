<?php
session_start();
require_once 'fonctions_capsule.php';

$id = $_POST['id'];

// Transmettre l'identifiant de la capsule à l'aide d'une variable de session
$_SESSION['id'] = $id;

// Récupérer les informations de la capsule à modifier
$capsule = getCapsuleById($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une capsule</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <a href="../index.php" class="btn-accueil">🏠 Accueil</a>
    <a href="./afficheCapsules.php" class="btn-retour">← Retour</a>
    <h1>Modifier une capsule</h1>
    <form action="ModifierCap.php" method="post">
        <label for="cap_nom">Nouveau nom :</label>
        <input type="text" id="cap_nom" name="cap_nom" value="<?php echo $capsule['cap_nom']; ?>" size="50" required /> <br /> <br />
        <label for="cap_prix">Nouveau prix :</label>
        <input type="number" id="cap_prix" name="cap_prix" value="<?php echo $capsule['cap_prix']; ?>" min="0" step="0.01" required /> <br /> <br />
        <label for="cap_intensite">Nouvelle intensité :</label>
        <input type="number" id="cap_intensite" name="cap_intensite" value="<?php echo $capsule['cap_intensite']; ?>" min="1" max="12" required> <br /> <br />
        <input type="submit" name="submit" value="Modifier" />
        <input type="reset" name="reset" value="reset" />
    </form>
</body>
</html>
