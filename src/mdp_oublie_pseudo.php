<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_POST['formpseudo'])) {
    $pseudomdp = htmlspecialchars($_POST['pseudomdp']);

    if (!empty($pseudomdp)) {
        $requser = $BDD->prepare("SELECT * FROM membres WHERE pseudo = ? ");
        $requser->execute(array($pseudomdp));
        $userexist = $requser->rowCount();;

        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['question'] = $userinfo['question'];
            header("Location: mdp_oublie_question.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Votre pseudo est incorrect !";
        }
    } else {
        $erreur = "Veuillez mettre votre pseudo ! ";
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
    <h2>Récupération du nom d'utilisateur</h2>
    <br /><br />
    <form method="POST" action="">
        <label class="h5">Pseudo : </label>
        <input type="text" name="pseudomdp" placeholder=" Votre Pseudo" />
        <br /><br />

        <input type="submit" name="formpseudo" value="Suivant" />

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