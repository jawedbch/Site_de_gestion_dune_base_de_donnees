<?php
session_start();
require_once 'fonctions_capsule.php';

// Vérifie qu'un ID est bien fourni
if (!isset($_POST['id'])) {
    header("Location: afficheCapsules.php");
    exit();
}

// Vérifie la table  choisie
if (!isset($_SESSION['table_choisie'])) {
    die("Table non définie.");
}

$table = $_SESSION['table_choisie'];
$id = $_POST['id'];

$element = getCapsuleById($id);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails - <?= $table ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<a href="../index.php" class="btn-accueil">🏠 Accueil</a>
<a href="afficheCapsules.php" class="btn-retour">← Retour</a>

<h1>Détails de l'élément dans la table <?= $table ?></h1>

<?php if ($element && $table === 'capsules'): ?>
    <ul>
        <li><strong>ID de la capsule :</strong> <?= $element['cap_id'] ?></li>
        <li><strong>Nom de la capsule :</strong> <?= $element['cap_nom'] ?></li>
        <li><strong>Prix de la capsule :</strong> <?= $element['cap_prix'] ?> €</li>
        <li><strong>Intensité de la capsule :</strong> <?= $element['cap_intensite'] ?></li>
    </ul>
<?php else: ?>
    <p>Élément introuvable.</p>
<?php endif; ?>

</body>
</html>
