<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion d'une capsule</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Insertion d'une capsule :</h1>
    <form action="inserer_capsule.php" method="post">
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" size="50" required />
        </p>
        <p>
            <label for="prix">Prix :</label>
            <input type="number" name="prix" id="prix" step="0.01" min="0" required />
        </p>
        <p>
            <label for="intensite">Intensité :</label>
            <input type="number" name="intensite" id="intensite" min="1" max="12" required />
        </p>
        <p>
            <input type="submit" value="Insérer">
            <input type="reset" value="Effacer">
        </p>
    </form>
</body>
</html>
