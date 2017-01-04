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
    public static function getAllColumnTable($table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        $columns = App::getDB()->query("SHOW columns FROM $table;");
        return $columns;
    }

    /**
     * @param string $oldName | Encient nom de la base de donnée 
     * @param string $newName | Nouveau nom de la base de donnée 
     * @return void
     */
    public static function renameBDD($oldName, $newName) {
        App::getDB()->query("SHOW columns FROM $table;");
    }

    /**
     * @param string $oldName | Encient nom de la table
     * @param string $newName | Nouveau nom de la table
     * @return void
     */
    public static function renameTable($oldName, $newName) {
        App::getDB()->prepare('use '.self::$bdd.';');
        App::getDB()->query("RENAME TABLE " . $oldName . " TO " . $newName . ";");
    }

    /**
     * @param string $bdd | Nom de la base de donnée à supprimer
     * @return void
     */
    public static function deleteBDD($bdd) {
        App::getDB()->query("DROP DATABASE " . $bdd . ";");
    }

    /**
     * @param string $bdd | Nom de la base de donnée
     * @param string $table | Nom de la table à supprimer
     * @return void
     */
    public static function deleteTable($table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        App::getDB()->query("DROP TABLE " . $table . ";");
    }

    /**
     * @param string $bdd | Nom de la base de donnée à ajouter
     * @return void
     */
    public static function addBDD($bdd) {
        App::getDB()->query("CREATE DATABASE " . $bdd . ";");
    }

    /**
     * @param string $table | Nom de la table a ajouter
     * @return void
     */
    public static function addTable($table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        App::getDB()->query("CREATE TABLE " . $table . " ( id INT PRIMARY KEY NOT NULL );");
    }

    /**
     * @param string $c_name | Nom de la nouvelle colone 
     * @param string $c_type | Type de la nouvelle colone 
     * @param int $c_size | Taille de la nouvelle colone 
     * @param string $c_defaultValue | Valeur par défault de la nouvelle colone 
     * @param string $c_index | Type de l'index de la nouvelle colone 
     * @param string $bdd | Nom de la base de donnée
     * @param string $table | Nom de la table
     * @return void
     */
    public static function addColumn($c_name, $c_type, $c_size, $c_defaultValue, $c_index, $c_ai, $table) {
        App::getDB()->prepare('use '.self::$bdd.';');
        $query = "ALTER TABLE " . $table . " ADD " . $c_name . " " . $c_type . "(" . $c_size . ")";
        if($c_defaultValue === 'Null')
            $query .= ' NULL DEFAULT NULL';
        if($c_ai === 'true')
            $query .= ' AUTO_INCREMENT, ADD PRIMARY KEY (`' . $c_name . '`)';
        else if($c_index === 'PRIMARY')
            $query .= ', ADD PRIMARY KEY (`' . $c_name . '`)';
        $query .= ';';
        App::getDB()->query($query);
    }

    /**
     * @param string $request | Requete a executer.
     * @return void
     */
    public static function getSQLResult($array) {
        if($array['database'] != 'all') {
            self::useBDD($array['database']);
            App::getDB()->prepare('use '.self::$bdd.';');
        }
        $result = App::getDB()->query($array['request']);
        return $result;
    }

}
