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
                //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
        try {
            $req = $this->getPDO()->query($statement);
            $datas = $req->fetchAll(PDO::FETCH_CLASS);
            return $datas;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param string $statement Contient la query à préparé.
     * @return void
     */
    public function prepare($statement) {
        try {
            $req = $this->getPDO()->prepare($statement);
            if (!$req) {
                echo "\nPDO::errorInfo():\n";
                print_r($dbh->errorInfo(), true);
            }
            if ($req->execute()) { 
                return(json_encode(array("message" => $req->errorInfo(), "succes" => true)));
            } else {
                return(json_encode(array("message" => $req->errorInfo(), "succes" => false)));
            };
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

?>