<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $BDD->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Profil</title>
</head>

<body>
<div align= "center">
    <h2>Votre profil</h2><h3> <?php echo $userinfo['prenom']; echo " "; echo $userinfo['nom']; ?> </h3>
    <br /><br />
    <form method="POST" action="">
        Pseudo = <?php echo $userinfo['pseudo']; ?>
        <br />
        Mail = <?php echo $userinfo['mail']; ?>

    </form><br />

    <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>

            <form>
                <button type="submit" formaction="parametre.php">Modifier profil</button>
                <button type="submit" formaction="deconnexion.php">Se déconnecter</button>
            </form>

    <?php
    }
    ?>
</div>
</body>

</html>