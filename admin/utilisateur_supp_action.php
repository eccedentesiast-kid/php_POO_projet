<!DOCTYPE html>
<html>
    <head>
        <title>NGUYEN - Suprrime Utilisateur</title>
        <link rel="stylesheet" href="../style/stylesAffichage.css"/>
    </head>

    <body>
        <?php
            include("../inc/connexion.php");
            include("../classes/Utilisateur.php");
            $u = new Utilisateur();
            $u->set_id($_REQUEST['id']);
            if ($u->supprimer($bdd, $u->get_id()))
                print "Supprime utilisateur ok.";
        ?>
        </br></br><a href='../admin/utilisateur_liste.php'>Afficher le tableau après le supprimer</a>

    </body>
</html>