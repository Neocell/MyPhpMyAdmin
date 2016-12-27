<?php

namespace ARG;
use ARG\Object\Database;

class App
{
    private static $database;

    public static function getDB() {
        if (self::$database === NULL) {
            self::$database = new Database;
        }
        return self::$database;
    }

    public static function ARGload() {
        require 'Autoloader.php';
        \ARG\Autoloader::register();
        require '../core/Autoloader.php';
        \Core\Autoloader::register();
    }
}

?>