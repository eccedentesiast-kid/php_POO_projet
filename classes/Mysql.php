<?php
    class Mysql {
        private $_serveur = "localhost";
        private $_login;
        private $_mdp;
        private $_bdd;
        private $_cnx;

        public function set_serveur($s) {
            $this->_serveur = $s;
        }

        public function set_login($s) {
            $this->_login = $s;
        }
        public function set_mdp($s) {
            $this->_mdp = $s;
        }
        public function set_bdd($s) {
            $this->_bdd = $s;
        }

        public function get_cnx() {
            return $this->_cnx;
        }

        public function connexion() {
            try {
                $this->_cnx = new PDO("mysql:host=".$this->_serveur.";dbname=".$this->_bdd,$this->_login,$this->_mdp,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            } catch (PDOException $e) {
                exit("Erreur de connexion bdd: ".$e->getMessage());
            }
        }

        public function deconnexion() {
            $this->_cnx = null;
        }

        public function requete($q) { //$q = $sql
            try {
                $query = $this->_cnx->prepare($q);
                $query->execute();
                $query->fetchAll(PDO::FETCH_OBJ);
                return $query;
            } catch (PDOException $e) {
                exit("<pre><i>=> Message: [Erreur de la requete [$q]: ]</i></pre>".$e->getMessage());
            }
        }
    }
?>
<!-- hello this is Mysql.php from classes -->