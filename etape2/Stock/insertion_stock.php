<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertion Stock</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <h1>Insertion Stock :</h1>
    <form action="inserer_stock.php" method="post">
        <p>
            <!-- Magasin -->
            <label for="magasin_id"><b>Magasin :</b></label><br>
            <select name="magasin_id" id="magasin_id" required>
                <option value="" disabled selected>-- Choisir un magasin --</option>
                <?php
                require "../Magasin/fonctions_magasin.php";
                foreach (getAllMagasins() as $magasin) {
                    echo "<option value=\"".$magasin['mag_id']."\">(".$magasin['mag_id'].", ".$magasin['mag_nom'].", ".$magasin['mag_adresse'].")</option>";
                }
                ?>
            </select>
        </p>

        <!-- Capsule -->
        <p>
            <label for="capsule_id"><b>Capsule :</b></label><br>
            <select name="capsule_id" id="capsule_id" required>
                <option value="" disabled selected>-- Choisir une capsule --</option>
                <?php
                require "../Capsule/fonctions_capsule.php";
                foreach (getAllCapsules() as $capsule) {
                    echo "<option value=\"".$capsule['cap_id']."\">(".$capsule['cap_id'].", ".$capsule['cap_nom'].", ".$capsule['cap_prix'].", ".$capsule['cap_intensite'].")</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <b>Quantité : </b>
            <input type="number" name="stock_quantite" min="1" size="5" required />
        </p>
        <p>
            <input type="submit" value="Inserer" />
            <input type="reset" value="Effacer" />
        </p>
    </form>
</body>
</html>
