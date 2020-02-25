<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $BDD->prepare("SELECT * FROM membes WHERE id = ?");
    $requser->execute(array($getid));
    $reqinfo = $requser->fetch();
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
    <h2>Votre profil</h2>
    <br /><br />
    <form method="POST" action="">
        Pseudo = <?php echo $reqinfo['pseudo']; ?>
        <br />
        Mail = <?php echo $reqinfo['mail']; ?>

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