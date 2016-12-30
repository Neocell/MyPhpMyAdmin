<?php

namespace ARG\Object;

use \PDO;

/**
 * Class Database 
 * Class qui permet une connection à MySQL afin de manipuler les bases de données.
 */
class Database
{
    /**
     * @var PDO $pdo | Variable contenant l'objet PDO pour ce connecter à MySQL.
     */
    private $pdo;

    /**
     * @return PDO
     */
    private function getPDO() {
        if ($this->pdo === NULL) {
            try {
                $dbh = new PDO('mysql:host=localhost;', "root", "");   
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $dbh; 
                return $dbh;
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return $this->pdo;
    }
    
    /**
     * @param string $statement Contient la query à exécuter.
     * @return $datas Résultat(s) de la requête.
     */
    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }

    /**
     * @param string $statement Contient la query à préparé.
     * @return void
     */
    public function prepare($statement) {
        $req = $this->getPDO()->prepare($statement);
        $req->execute();
    }

}

?>