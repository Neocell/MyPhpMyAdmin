<?php

namespace ARG;

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = "root", $db_pass = "root", $db_host = "localhost") {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function get_PDO() {
        if ($this->pdo === NULL) {
            try {
                $dbh = new PDO('mysql:host=' . $this->db_host . ';', $this->db_user, $this->db_pass); 
                $this->pdo = $dbh;   
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return $this->pdo;
    }
    
    public function get_allDatabases() {
        $databases = $dbh->query('SHOW DATABASES')->fetchAll(PDO::FETCH_CLASS, 'Database');
        return $databases;
    }

}

?>