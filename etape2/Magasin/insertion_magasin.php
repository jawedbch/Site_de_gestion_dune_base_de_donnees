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
    <h1>Insertion Magasin :</h1>
    <form action="inserer_magasin.php" method="post">
        <p>
            <b>Nom du magasin : </b>
            <input type="text" name="nom" size="50" required />
        </p>
        <p>
            <b>Adresse du magasin : </b>
            <input type="text" name="adresse" size="100" required />
        </p>
        <p>
            <input type="submit" name="envoyer" value="Inserer" />
            <input type="reset" name="effacer" value="Effacer" />
        </p>
    </form>
</body>
</html>
