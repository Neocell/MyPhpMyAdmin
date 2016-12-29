<?php

namespace ARG\Models;
use ARG\App;

/**
 * Class BDDModel
 * Model qui va stocker toute les méthodes qui font appel à la base de donnée.
 */
class BDDModel 
{
    /**
     * @var string $bdd | Variable contenant la base de donnée qui va être intérrogé.
     */
    private static $bdd;



    /**
     * @param string $bdd | Nom de la base de donnée
     * @return void
     */
    public static function useBDD($bdd) {
        self::$bdd = $bdd;
    }

    /**
     * @return array $datas | Contient toute les base de données 
     */
    public static function getAllDatabases() {
        $datas = App::getDB()->query('SHOW DATABASES');
        return $datas;
    }

    /**
     * @return int $nb_tables | Nombre de tables
     */
    public static function countTables() {
        $nb_tables = App::getDB()->query('SELECT COUNT(*) as nbr_Table FROM information_schema.tables WHERE table_schema = \''.self::$bdd.'\'');
        return $nb_tables;
    }

    /**
     * @return float $em | Espace mémoire de la base de donnée passé en paramétre
     */
    public static function memorySpaceDatabase() {
        $em = App::getDB()->query('SELECT Round(Sum(data_length + index_length) / 1024 / 1024, 1) as em FROM information_schema.tables WHERE table_schema = \''.self::$bdd.'\' GROUP BY table_schema');
        return $em;
    }

    /**
     * @return array $tables | Liste des tables de la base de donnée passé en paramétre
     */
    public static function getAllTables() {
        App::getDB()->prepare('use '.self::$bdd.';');
        $tables = App::getDB()->query('SHOW table status;');
        return $tables;
    }

    /**
     * @param string $table | Nom de la table
     * @return array $tables | Liste des lignes contenu dans la table
     */
    public static function getAllContentTable($table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        $contents = App::getDB()->query("SELECT * FROM $table;");
        return $contents;
    }

    /**
     * @param string $table | Nom de la table
     * @return array $tables | Liste des lignes contenu dans la table
     */
    public static function getAllColumnNameTable($table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        $columns = App::getDB()->query("SHOW columns FROM $table;");
        return $columns;
    }

}
