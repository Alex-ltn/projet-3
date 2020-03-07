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

<?php require 'layout/header.php' ?>

        <h4><?php echo $userinfo['prenom']; ?><?php echo " "; ?><?php echo $userinfo['nom']; ?></h4>
        <a href="deconnexion.php">Se déconnecter</a>
    </div>
</header>

<br />

<main>

<div method="POST" action="" align="center">
    <div class="card border-primary mb-3">
        <div class="card-header">Votre profil</div>
            <div class="card-body">
                <label class="h5">Pseudo = <?php echo $userinfo['pseudo']; ?></label><br />
                <label class="h5">Mail = <?php echo $userinfo['mail']; ?></label><br />
            </div>

    <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
    ?>

            <div>
                <form method="post" action="">
                  <button type="submit" formaction="parametre.php" class="btn btn-outline-danger">Modifier profil</button>
                  <button type="submit" formaction="deconnexion.php" class="btn btn-outline-dark">Se déconnecter</button>
                </form>
                  <br />
            </div>

    <?php
    }
    ?>

    </div>
</form>
</div>
</main>

<?php require 'layout/footer.php' ?>