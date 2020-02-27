<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Mot de passe oublié</title>
</head>

<body>
<div align= "center">
    <h2>Récupération du nom d'utilisateur</h2>
    <br /><br />
    <form method="POST" action="">
        <label class="h5">Pseudo : </label>
        <input type="text" name="pseudoconnect" placeholder="Pseudo" />

        <br />

    </form><br />
</div>
</body>

</html>