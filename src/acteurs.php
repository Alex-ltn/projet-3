<?php
session_start();

require_once('../config/db.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Accueil</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="connecter">
<header>
    <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
    <ul class="head_ul alert bg-dark">
        <li class="text-white"><i class="fas fa-user"></i></li>
        <li><a href="parametres.php?account=" class="text-white"><i class="fas fa-cog"></i>Paramètres du compte</a></li>
        <li class="text-white"><a href="deconnexion.php" class="text-white"><i class="fas fa-university"></i>Deconnexion</a></li>
    </ul>
</header>
<main>
    <section class="mobile_text jumbotron">
        <h1>Présentation de la GBAF</h1>
        <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
        <ul>
            <li>La BNP Paribas</li>
            <li>BPCE</li>
            <li>Crédt Agricole</li>
            <li>Crédit Mutuel-CIC</li>
            <li>Société Générale</li>
            <li>La Banque Postale</li>
        </ul>
        <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
    </section>
    <section>
        <h2>Textes acteurs et partenaires</h2>

            <div class="alert alert-dark">
                <p>Cet acteur n'existe pas !</p>
            </div>

            <div class="card mb-3 border-primary">
                <div class="flex_acteurs">
                    <div class="center">
                        <a href="acteurs.php?acteurs="><img src="../logo/"></a>
                    </div>
                    <div class="card-body-text">
                        <h3 class="card-title"></h3>
                        <p class="card-text">...</p>
                    </div>
                </div>
                <div class="link">
                    <a href="acteurs.php?acteurs=" class="btn btn-link">lire la suite</a>
                </div>
            </div>
        <div class="push"></div>
    </section>
</main>
<footer>
    <ul class="bg-dark text-white">
        <li><a href="mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
    </ul>
</footer>
</body>
</html>