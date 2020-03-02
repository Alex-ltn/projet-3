<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if (isset($_POST['formquestion']))
{
    $pseudomdp= htmlspecialchars($_POST['pseudomdp']);

    if (!empty($reponsemdp))
    {
        $requser = $BDD->prepare("SELECT * FROM membres WHERE reponse = ? ");
        $requser->execute(array($pseudomdp));
        $userexist = $requser->rowCount();;

        if ($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['question'] = $userinfo['question'];
            header("Location: mdp_oublie_question.php?id=".$_SESSION['id']);
        }

        else
        {
            $erreur = "Votre pseudo est incorrect !";
        }
    }

    else
    {
        $erreur = "Le champs Pseudo doit être complété ! ";
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
        <?php echo $userinfo['question'] ?><br />
        <label class="h5">Réponse : </label>
        <input type="text" name="reponsemdp" placeholder=" Votre Réponse" />
        <br /><br />
        <input type="submit" name="formquestion" value="Suivant" />

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