<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>NGUYEN - Modifier</title>
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
                <h1>Modifier un utilisateur</h1>
                <div>Veuillez entrer les informations pour modifier un utilisateur</div>
            </div>
            <form id="form1" name="form1" method="post" action="utilisateur_modi_action.php">
                <div class="form-item">
                    <label>Identifiant * </label>
                    <input type="text" name="id" placeholder="Entrer ID" autofocus required>
                </div>
                <div class="form-item">
                    <label>Nom * </label>
                    <input type="text" name="nom" placeholder="Entrer Nom" autofocus>
                </div>
                <div class="form-item">
                    <label>Prenom * </label>
                    <input type="text" name="prenom" placeholder="Entrer Prenom">
                </div>
                <div class="form-item">
                    <label>Mail * </label>
                    <input type="text" name="mail" placeholder="Entrer Email">
                </div>
                <div class="form-item">
                    <label>Mot de passe</label>
                    <input type="text" name="mdp" placeholder="Entrer Mot de passe">
                </div>
                <div class="form-item">
                    <label>Date de naissance</label>
                    <input type="text" name="d_naissance" placeholder="jj-mm-aaaa">
                </div>
                <input type="submit" value="Modifier">
            </form>
        </div>
    </body>
</html>

