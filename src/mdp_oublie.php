<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_SESSION['id'])) {

    if (isset($_POST['formmdp'])) {

        if (isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $newmdp1 = sha1($_POST['newmdp1']);
            $newmdp2 = sha1($_POST['newmdp2']);

            if ($newmdp1 == $newmdp2) {
                $insertmdp = $BDD->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
                $insertmdp->execute(array($newmdp1, $_SESSION['id']));
                $erreur = "Votre mot de passeà  bien été modifié ! <a href=\"connexion.php\"> Me connecter </a>";
            } else {
                $erreur = "Vos deux mdp ne correspondent pas !";
            }
        }
    }

    if (isset($_POST['submitStop'])) {
        header('Location: deconnexion.php');
    }

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
        <input name="submitStop" type="submit" value="Annuler" />

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
<?php
}
else {
    header("Location: connexion.php");
}
?>