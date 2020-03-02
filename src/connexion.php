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
    <link rel="stylesheet" href="../public/css/style.css" />
    <title>Connexion</title>
</head>

<body>
<div align= "center">
    <h1>Connection à votre compte</h1>
    <br /><br />
    <H3>Rentrez vos informations</H3>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <label class="h5">Votre pseudo :</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="53" name="pseudoconnect" placeholder="Pseudo">
                </td>
            </tr>

            <tr>
                <td>
                    <label class="h5">Votre mot de passe :</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" size="53" name="mdpconnect" placeholder="Mot de passe">
                </td>
            </tr>

        </table><br />

        <input type="submit" name="formconnect" value="Se connecter" /><br />
        <a href="mdp_oublie_pseudo.php">Mot de passe oublié ?</a>
        <br /><br />

        <h3>Première visite sur ce site ?</h3>

        <label class="h5">Pour vous connecter, veuillez vous créer un compte !</label><br /><br />

        <form>
            <button type="submit" formaction="inscription.php">S'inscrire</button>
        </form>

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