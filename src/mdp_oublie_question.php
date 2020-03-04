<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_POST['submitStop'])) {
    header('Location: deconnexion.php');
}

if(isset($_SESSION['id'])) {

    if (isset($_GET['id']) AND $_GET['id'] > 0)     // Récupération de la question secrète
    {
        $getid = intval($_GET['id']);
        $reqquestion = $BDD->prepare('SELECT * FROM membres WHERE id = ?');
        $reqquestion->execute(array($getid));
        $userinfo = $reqquestion->fetch();
    }

    if (isset($_POST['formquestion'])) {
        $reponsemdp = htmlspecialchars($_POST['reponsemdp']);

        if (!empty($reponsemdp)) {
            $requser = $BDD->prepare("SELECT * FROM membres WHERE reponse = ?");
            $requser->execute(array($reponsemdp));
            $userexist = $requser->rowCount();


            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                header("Location: mdp_oublie.php?id=" . $_SESSION['id']);
            } else {
                $erreur = "Votre réponse est incorrecte !";
            }
        } else {
            $erreur = "Veuillez mettre une réponse !";
        }
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
    <h2>Répondre à la question de sécurité</h2>
    <br /><br />
    <form method="POST" action="">
        <?php echo $userinfo['pseudo'] ?><br />
        <?php echo $userinfo['question'] ?><br />
        <label class="h5">Réponse : </label>
        <input type="text" name="reponsemdp" placeholder=" Votre Réponse" />
        <br /><br />
        <input type="submit" name="formquestion" value="Suivant" />
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