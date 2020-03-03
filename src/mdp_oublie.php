<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../public/css/style.css" />
    <title>Mot de passe oublié</title>
</head>

<body>
<div align= "center">
    <h2>Réinitialisez votre mot de passe</h2>
    <br /><br />
    <form method="POST" action="">
        <label class="h5">Mot de passe : </label>
        <input type="text" name="newmdp1" placeholder="Votre nouveau Mot de passe" /><br />
        <label class="h5">Mot de passe : </label>
        <input type="text" name="newmdp2" placeholder="Confirmer votre Mot de passe" />
        <br /><br />
        <input type="submit" name="formmdp" value="Enregistrer" />

        <br />

    </form><br />

    <?php
    if(isset($erreur ))
    {
        echo $erreur;
    }
    ?>

</div>
</body>

</html>