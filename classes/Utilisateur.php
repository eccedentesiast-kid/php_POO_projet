<?php
    class Utilisateur {
        private $_id;
        private $_nom;
        private $_prenom;
        private $_d_naissance;
        private $_mail;
        private $_mdp;
        
        public function set_nom($s) {
            if (strlen($s) == 0)
                exit("<i>=> Message: [Utilisateur : le nom est obligatoire!]</i>");
            $this->_nom = $s;
        }

        public function set_prenom($s) {
            if (strlen($s) == 0)
                exit("<i>=> Message: [Utilisateur : le prenom est obligatoire!]</i>");
            $this->_prenom = $s;
        }

        public function set_dnaissance($s) { // format d'entrés : jj/mm/aaaa
            $newDate = date("Y-m-d", strtotime($s));
            $this->_d_naissance = $newDate;
        }

        public function set_mail($s) {
            if (strlen($s) == 0)
                exit("<i>=> Message: [Utilisateur : le mail est obligatoire!]</i>");
            $this->_mail = $s;
        }

        public function set_mdp($s) {
            if (strlen($s) == 0) {
                $s = "1234";
            }
            if (strlen($s) < 4 || strlen($s) > 15)
                exit("<i>=> Message: [Utilisateur : le mdp doit être compris entre 4 et 15 caractères!]</i>");
            $this->_mdp = $s;
        }

        public function set_id($x) {
            $this->_id = $x;
        }

         public function enregistrer(Mysql $bdd) {
            $q = "INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `d_naissance`, `mail`, `mdp`)
                  VALUES (null, '$this->_nom', '$this->_prenom', '$this->_d_naissance', '$this->_mail', '$this->_mdp')";
            $query = $bdd->requete($q);
            echo "<h2>Enregistrer un utilisateur avec identifiant ".$this->_id.": </h2>";
            if ($query->rowCount() > 0) {
                $count = $query->rowCount();
                echo "<i>=> Message: [".$count." ligne a été enregistré.]</i>";
            }
        }

        public function supprimer(Mysql $bdd, $id) {
            $q = "DELETE FROM `utilisateur`
                    WHERE `id` = '$id'";
            $query = $bdd->requete($q);

            echo "<h2>Supprimer un utilisateur avec identifiant ".$id.": </h2>";
            if ($query->rowCount() > 0) {
                $count = $query->rowCount();
                echo "<i>=> Message: [".$count." ligne a été affectée.]</i>";
            } else {
                echo "<i>=> Message: [Il n'y a pas d'enregistrements correspondants pour supprimer des données.]</i>";
            }
        }
        
        public function get_id() {
            return $this->_id;
        }

        public function get_nom() {
            return $this->_nom;
        }

        public function get_prenom() {
            return $this->_prenom;
        }

        public function get_dnaissance() {
            return $this->_d_naissance;
        }

        public function get_mail() {
            return $this->_mail;
        }

        public function get_mdp() {
            return $this->_mdp;
        }

        public function get_un(Mysql $bdd, $id) {
            $q = "SELECT * FROM `utilisateur`
                    WHERE `id` = '$id'";
            $query = $bdd->get_cnx()->prepare($q);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                $u = new Utilisateur();
                $u->set_id($result->id);
                $u->set_nom($result->nom);
                $u->set_prenom($result->prenom);
                $u->set_dnaissance($result->d_naissance);
                $u->set_mail($result->mail);
                $u->set_mdp($result->mdp);
                return $u;
            }
        }

        function get_liste(Mysql $bdd, $order_by='id', $order_type='ASC') {
            $q = "SELECT * FROM utilisateur
                  ORDER BY $order_by $order_type";
            $query = $bdd->get_cnx()->prepare($q);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            $allUsers = "";
            $allUsers .= "<h2>Afficher le contenu de la base de données: </h2>";
            if ($query->rowCount() > 0) {
                $allUsers .= "<table> <tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th id='mail'>Mail</th><th>Mot de passe</th></tr>";
                foreach ($results as $result) {
                    // données de sortie de chaque ligne
                    $allUsers .= "<tr><td>".$result->id."</td><td>".$result->nom."</td><td>".$result->prenom."</td><td>".$result->d_naissance."</td><td>".$result->mail."</td><td>".$result->mdp."</td></tr>";
                }
                $allUsers .= "</table>";
            }
    
            return $allUsers;
        }

        public function modifier(Mysql $bdd, $id, $nom, $prenom, $d_naissance, $mail, $mdp) {
            $q = "UPDATE utilisateur
                    SET nom = '$nom', prenom = '$prenom', d_naissance = '$d_naissance', mail = '$mail', mdp = '$mdp'
                    WHERE id = $id";
            $query = $bdd->requete($q);

            if ($query->rowCount() > 0) {
                $count = $query->rowCount();
                echo "<i>=> Message: [".$count." ligne a été modifiée.]</i>";
            } else {
                echo "<i>=> Message: [il n'y a aucune information à modifier pour l'utilisateur id $id.]</i>";
            }
        }
    }

?>
<!-- $sql = "CREATE TABLE IF NOT EXISTS Utilisateur (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    nom VARCHAR(50) NOT NULL,
                    prenom VARCHAR(30) NOT NULL,
                    d_naissance date DEFAULT NULL,
                    mail VARCHAR(50) NOT NULL UNIQUE,
                    mdp VARCHAR(15) DEFAULT '1234'
            )"; -->