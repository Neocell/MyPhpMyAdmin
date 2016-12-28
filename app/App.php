<?php

namespace ARG;
use ARG\Object\Database;
use ARG\Models\BDDModel;

/**
 * Class App
 * Class qui ne contient que des function static qui permet d'être appeller dans toute l'application.
 */
class App
{
    /**
     * @var Database $database | Variable contenant l'objet Database.
     */
    private static $database, $api;

    /**
     * Function qui permet de charger/d'initialiser la variable static $database.
     * @return Database $database 
     */
    public static function getDB() {
        if (self::$database === NULL) {
            self::$database = new Database;
        }
        return self::$database;
    }

    /**
     * Function qui permet de charger/d'initialiser la variable static $api.
     * @return BDDModel $api 
     */
    public static function getAPI() {
        if (self::$api === NULL) {
            self::$api = new BDDModel;
        }
        return self::$api;
    }

    /**
     * Function qui permet de charger les autoloaders de l'application.
     * @return void
     */
    public static function ARGload() {
        require 'Autoloader.php';
        \ARG\Autoloader::register();
        require '../core/Autoloader.php';
        \Core\Autoloader::register();
    }
}

?>