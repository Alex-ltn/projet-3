<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../public/css/bootstrap.css" />
    <link rel="stylesheet" href="../public/css/style.css" />
    <title>GBAF</title>
</head>

<body>

<header>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
        ?>

          <div align="center">
                <a href="connexion.php"><img src="../public/img/partenaires/logo.png" alt="logo1" /></a>
        <ul>
        <li><h5>  <?php echo $userinfo['prenom']; ?><?php echo " "; ?><?php echo $userinfo['nom']; ?>  </h5></li>
    <li><a href="parametre.php">Paramètres du compte</a></li>
    <li><a href="deconnexion.php">Se déconnecter</a></li>
    </ul>
    </div>
    <?php
    }
    else { ?>
        <div align="center">
            <a href="connexion.php"><img src="../public/img/partenaires/logo.png" alt="logo1" /></a>
    <?php }
    ?>

</header>