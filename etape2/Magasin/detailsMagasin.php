<?php
session_start();
require_once 'fonctions_magasin.php';

// Vérifie qu'un ID est bien fourni
if (!isset($_POST['id'])) {
    header("Location: afficheMagasins.php");
    exit();
}

// Vérifie que la table est définie dans la session
if (!isset($_SESSION['table_choisie'])) {
    die("Table non définie dans la session.");
}

$table = $_SESSION['table_choisie'];
$id = $_POST['id'];

$element = getMagasinById($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails - <?= $table ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<!-- Boutons navigation -->
<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="afficheMagasins.php" class="btn-retour">← Retour</a>

<h1>Détails de l'élément dans la table <?= $table ?></h1>

<?php if ($element && $table === 'magasins'): ?>
    <ul>
        <li><strong>ID du magasin :</strong> <?= $element['mag_id'] ?></li>
        <li><strong>Nom du magasin :</strong> <?= $element['mag_nom'] ?></li>
        <li><strong>Adresse du magasin :</strong> <?= $element['mag_adresse'] ?></li>
    </ul>
<?php else: ?>
    <p>Magasin introuvable.</p>
<?php endif; ?>

</body>
</html>
