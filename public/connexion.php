<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_POST['formconnect']))
{
    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);

    if (!empty($pseudoconnect) AND !empty($mdpconnect))
    {
        $requser = $BDD->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount();;


        if ($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil.php?id=".$_SESSION['id']);
        }

        else
        {
            $erreur = "Pseudo et/ou Mot de passe incorrect(s)";
        }
    }

    else
    {
         $erreur = "tous les champs doivent être complétés !";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Connexion</title>
</head>

<body>
<div align= "center">
    <h2>Connection</h2>
    <br /><br />
    <form method="POST" action="">
        <input type="text" name="pseudoconnect" placeholder="Pseudo">
        <input type="password" name="mdpconnect" placeholder="Mot de passe">
        <input type="submit" name="formconnect" value="Se connecter" />

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