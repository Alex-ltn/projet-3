<?php

$BDD = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);                     /*chiffer mdp */
    $mdp2 = sha1($_POST['mdp2']);                   /* chiffrer mdp */

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
         $pseuolength = strlen($pseudo);
         if($pseudo <= 255)
         {
             $reqpseudo = $BDD->prepare("SELECT * FROM membres WHERE pseudo = ?");       /* pour savoir si mail déjà utilisée */
             $reqpseudo->execute(array($pseudo));
             $pseudoexist = $reqpseudo->rowCount();

             if ($pseudoexist == 0) 
             {
                 if (filter_var($mail, FILTER_VALIDATE_EMAIL))        /* adresse mail valide (protection) */ {
                     $reqmail = $BDD->prepare("SELECT * FROM membres WHERE mail = ?");       /* pour savoir si mail déjà utilisée */
                     $reqmail->execute(array($mail));
                     $mailexist = $reqmail->rowCount();

                     if ($mailexist == 0) {

                         if ($mdp == $mdp2) {
                             $insertmbr = $BDD->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                             $insertmbr->execute(array($pseudo, $mail, $mdp));
                             $erreur = "Votre compte à bien été créé ! <a href=\"connexion . php\"> Me connecter </a>";
                         } else {
                             $erreur = "Vos mots de passe ne correspondent pas !";
                         }
                     } else {
                         $erreur = "Adresse mail déjà utilisée !";
                     }
                 } else {
                     $erreur = "Veuillez rentrer une adresse mail valide ! ";
                 }

             }
             else
             {
                 $erreur = "Pseudo déjà utilisé !";
             }

        }
         else
        {
            $erreur = "Votre pseudo ne doit pas dépasser les 255 caractères";
        }
    }

    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Accueil</title>
    </head>

    <body>
        <div align= "center">
            <h2>Inscription</h2>
            <br /><br />
            <form method="POST" action="">
                <table>
                   <tr>
                       <td>
                           <label>Pseudo :</label>
                       </td>
                       <td>
                            <input type="text" placeholder="Votre Pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
                       </td>
                   </tr>

                    <tr>
                        <td>
                            <label>Mail :</label>
                        </td>
                        <td>
                            <input type="email" placeholder="Votre Mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre Mot de passe" name="mdp" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Confirmation Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez votre Mot de passe" name="mdp2" />
                        </td>
                    </tr>


                </table><br />

                <input type="submit" name="forminscription" value="Je m'inscris" />

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