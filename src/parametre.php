<?php
session_start();

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_SESSION['id'])) {

    $requser = $BDD->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $userinfo = $requser->fetch();

    if (isset($_POST['submitBackButton'])) {
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $BDD->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $BDD->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $insertmdp = $BDD->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
    ?>
    <html>
    <head>
        <title>Parametre</title>
        <link rel="stylesheet" href="../public/css/style.css" />
        <meta charset="utf-8">
    </head>
    <body>
    <div align="center">
        <h2>Édition de votre profil</h2>
        <div align="center">
            <form method="POST" action="" enctype="multipart/form-data">
                <table>

                    <tr>
                        <td>
                            <label class="h5">Pseudo :</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" size="53" name="newpseudo" placeholder="Pseudo" value="<?php echo $userinfo['pseudo']; ?>" /><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="h5">Mail :</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" size="53" name="newmail" placeholder="Mail" value="<?php echo $userinfo['mail']; ?>" /><br /><br />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="h5">Mot de passe :</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" size="53" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="h5">Confirmation :</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" size="53" name="newmdp2" placeholder="Confirmation Mot de passe" /><br /><br />
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Mettre à jour"/>
                <input name="submitBackButton" type="submit" value="Retour" />
            </form>

            <?php if(isset($msg)) { echo $msg; } ?>
        </div>
    </div>
    </body>
    </html>
    <?php
}
else {
    header("Location: connexion.php");
}
?>