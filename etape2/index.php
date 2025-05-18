<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body>
<h1>Accueil</h1>
<form action="redirectAfficheTable.php" method="post">
    <label for="table">Choisir une table à consulter :</label>
    <select name="table" id="table" required>
        <option value="capsules">Capsules</option>
        <option value="magasins">Magasins</option>
        <option value="stocks">Stocks</option>
    </select>
    <input type="submit" value="Consulter" />
</form>
</body>
</html>
