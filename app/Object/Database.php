<?php

namespace ARG\Object;

use \PDO;

class Database
{
    private $pdo;

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
    
    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        return $datas;
    }

}

?>