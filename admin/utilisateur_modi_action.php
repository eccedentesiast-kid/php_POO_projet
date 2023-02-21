<!DOCTYPE html>
<html>
    <head>
        <title>NGUYEN - Modifie Utilisateur</title>
        <link rel="stylesheet" href="../style/stylesAffichage.css"/>
    </head>

    <body>
        <?php
            include("../inc/connexion.php");
            include("../classes/Utilisateur.php");
            $u = new Utilisateur();
            $u->set_id($_REQUEST['id']);
            $id = $u->get_id();

            echo "<h2>Modifier un utilisateur avec identifiant ".$id.": </h2>";
            if ($bdd->requete("SELECT * FROM utilisateur WHERE id = $id")->rowCount() > 0) {
                $user = $u->get_un($bdd, $id);
                //Les informations qui ne veulent pas être modifiées prendront leurs propres anciennes informations.
                if ($_REQUEST['nom']) {
                    $u->set_nom($_REQUEST['nom']);
                } else {
                    $u->set_nom($user->get_nom());
                }
                if ($_REQUEST['prenom']) {
                    $u->set_prenom($_REQUEST['prenom']);
                } else {
                    $u->set_prenom($user->get_prenom());
                }
                if ($_REQUEST['d_naissance']) {
                    $u->set_dnaissance($_REQUEST['d_naissance']);
                } else {
                    $u->set_dnaissance($user->get_dnaissance());
                }
                if ($_REQUEST['mail']) {
                    $u->set_mail($_REQUEST['mail']);
                } else {
                    $u->set_mail($user->get_mail());
                }
                if ($_REQUEST['mdp']) {
                    $u->set_mdp($_REQUEST['mdp']);
                } else {
                    $u->set_mdp($user->get_mdp());
                }
                if ($u->modifier($bdd, $u->get_id(), $u->get_nom(), $u->get_prenom(), $u->get_dnaissance(), $u->get_mail(), $u->get_mdp()))
                    print "Modifie utilisateur ok.";
            } else {
                echo "<i>=> Message: [Il n'y a pas d'enregistrements correspondants pour modifier des données.]</i>";
            }
        ?>
        </br></br><a href='../admin/utilisateur_liste.php'>Afficher le tableau après le modifier</a>

    </body>
</html>