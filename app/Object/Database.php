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
                // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
     * @param array $errors | Contient l'arraylist des erreurs.
     * @return string $result | Affiche dans une alert l'erreur de la requete. 
     */
    public function print_error($errors) {
        echo '<div class="alert alert-dismissible alert-danger">' .
             '<strong>Code d\'erreur SQLSTATE : ' . $errors[0] . '</strong>' .
             '<p>Code d\'erreur spécifique au driver : ' . $errors[1] . '</p>' .
             '<p>Error : ' . $errors[2] . '</p>' .
             '</div>';
    }
    
    /**
     * @param string $statement Contient la query à exécuter.
     * @return $datas Résultat(s) de la requête.
     */
    public function query($statement) {
        try {
            $req = $this->getPDO()->query($statement) or die ($this->print_error($this->getPDO()->errorInfo()));
            if(!$req)
                $datas = [];
            else 
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
                die ($this->print_error($this->getPDO()->errorInfo()));
            }
            $req->execute() or die ($this->print_error($this->getPDO()->errorInfo(), true));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

?>