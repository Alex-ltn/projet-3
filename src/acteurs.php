<?php

require_once('../config/db.php');

?>

<?php require 'layout/header.php' ?>

<main>
    <section class="jumbotron">
        <h1 align="center">Présentation de la GBAF</h1>
        <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
        <ul>
            <li>- La BNP Paribas</li>
            <li>- BPCE</li>
            <li>- Crédt Agricole</li>
            <li>- Crédit Mutuel-CIC</li>
            <li>- Société Générale</li>
            <li>- La Banque Postale</li>
        </ul>
        <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
    </section>
    <section>
        <h2 align="center">Acteurs et partenaires</h2>
        <div class="card mb-3 border-primary">
            <table>
                <tr>
                    <td>
                        <a href="acteurs.php"><img src="../public/img/partenaires/CDE.png"></a>
                    </td>
                    <td>
                        <p class="card-text">La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.</p>
                    </td>
                </tr>
            </table>
            <div class="link" align="right">
                <a href="acteurs.php?acteurs=" class="btn btn-link">lire la suite</a>
            </div>
            <br />
            </div>
        <div class="card mb-3 border-primary">
            <table>
                <tr>
                    <td>
                        <a href="acteurs.php"><img src="../public/img/partenaires/Dsa_france.png"></a>
                    </td>
                    <td>
                        <p class="card-text">Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. Nous accompagnons les entreprises dans les étapes clés de leur évolution. Notre philosophie : s’adapter à chaque entreprise. Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.</p>
                    </td>
                </tr>
            </table>
            <div class="link" align="right">
                <a href="acteurs.php?acteurs=" class="btn btn-link">lire la suite</a>
            </div>
        </div>
        <div class="card mb-3 border-primary">
            <table>
                <tr>
                    <td>
                        <a href="acteurs.php"><img src="../public/img/partenaires/formation_co.png"></a>
                    </td>
                    <td>
                        <p class="card-text">Formation&co est une association française présente sur tout le territoire. Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p>
                    </td>
                </tr>
            </table>
            <div class="link" align="right">
                <a href="acteurs.php?acteurs=" class="btn btn-link">lire la suite</a>
            </div>
        </div>
        <div class="card mb-3 border-primary">
            <table>
                <tr>
                    <td>
                        <a href="acteurs.php"><img src="../public/img/partenaires/protectpeople.png"></a>
                    </td>
                    <td>
                        <p class="card-text">Protectpeople finance la solidarité nationale. Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.</p>
                    </td>
                </tr>
            </table>
            <div class="link" align="right">
                <a href="acteurs.php?acteurs=" class="btn btn-link">lire la suite</a>
            </div>
        </div>
    </section>
</main>

<?php require 'layout/footer.php' ?>