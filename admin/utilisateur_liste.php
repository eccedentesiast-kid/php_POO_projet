<!DOCTYPE html>
<html>
    <head>
        <title>NGUYEN - Base de données</title>
        <link rel="stylesheet" href="../style/stylesAffichage.css"/>
    </head>

    <body>
        <div id="menu">
            <ul>
                <li><a href="../admin/utilisateur_ajout.php">Enregistrer</a>
                <li><a href="../admin/utilisateur_supp.php">Supprimer</a>
                <li><a href="../admin/utilisateur_modi.php">Modifier</a>
                <li><a href="../admin/utilisateur_liste.php">Afficher</a>
            </ul>
        </div>
        <br>
        <?php
            include("../inc/connexion.php");
            include("../classes/Utilisateur.php");
            $u = new Utilisateur();
            if ($allUsers = $u->get_liste($bdd))
                echo $allUsers;
        ?>
    </body>
</html>