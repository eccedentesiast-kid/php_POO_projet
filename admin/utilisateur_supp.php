<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>NGUYEN - Supprimer</title>
        <link rel="stylesheet" href="../style/styles.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
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
        <div class="entrer-form">
            <div class="entrer-form-logo">
                <img src="../images/logo.png" alt="logo">
            </div>
            <div class="entrer-form-header">
                <h1>Supprimer un utilisateur</h1>
                <div>Veuillez entrer un identifiant pour supprimer un utilisateur</div>
            </div>
            <form id="form1" name="form1" method="post" action="utilisateur_supp_action.php">
                <div class="form-item">
                    <!-- <span class="form-item-icon material-symbols-rounded">mail</span> -->
                    <label>Identifiant * </label>
                    <input type="text" name="id" placeholder="Entrer ID" autofocus required>
                </div>
                <input type="submit" value="Supprimer">
            </form>
        </div>
    </body>
</html>

