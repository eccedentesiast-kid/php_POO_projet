<!DOCTYPE html>
<html>
    <head>
        <title>NGUYEN - Ajout Utilisateur</title>
        <link rel="stylesheet" href="../style/stylesAffichage.css"/>
    </head>

    <body>
        <?php
            include("../inc/connexion.php");
            include("../classes/Utilisateur.php");
            $u = new Utilisateur();
            $u->set_nom($_REQUEST['nom']);
            $u->set_prenom($_REQUEST['prenom']);
            $u->set_mail($_REQUEST['mail']);
            $u->set_mdp($_REQUEST['mdp']);
            $u->set_dnaissance($_REQUEST['d_naissance']);
            if ($u->enregistrer($bdd))
                print "Ajout utilisateur ok.";
        ?>
        </br></br><a href='../admin/utilisateur_liste.php'>Afficher le tableau après l'enregistrer</a>

    </body>
</html>