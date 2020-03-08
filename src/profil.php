<?php

require('../config/db.php');

if (isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $BDD->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

if (isset($_POST['submitPara'])) {
    header('Location: parametre.php');
}

if (isset($_POST['submitDeco'])) {
    header('Location: deconnexion.php');
}


?>

<?php require 'layout/header.php' ?>

<br />
<main>
<div method="POST" action="" align="center">
    <div class="card border-primary mb-3">
        <div class="card-header">Votre profil</div>
            <div class="card-body">
                <label class="h5">Pseudo = <?php echo $userinfo['pseudo']; ?></label><br />
                <label class="h5">Mail = <?php echo $userinfo['mail']; ?></label><br />
            </div>
    </div>
</div>

    <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>

            <div align="center">
                <form method="post" action="">
                  <button type="submit" name="submitPara" class="btn btn-outline-danger">Modifier</button>
                  <button type="submit" name="submitDeco" class="btn btn-outline-dark">Se déconnecter</button>
                </form>
                <br />
            </div>

    <?php
    }
    ?>

</form>
</main>

<?php require 'layout/footer.php' ?>