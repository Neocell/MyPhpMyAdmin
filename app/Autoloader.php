<?php

namespace ARG;

/**
 * Class Autoloader
 * Permet de générer un autoloader.
 */
class Autoloader 
{
    /**
     * Fonction static qui permet d'execter notre autoloader.
     */
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Fonction static qui permet de créer notre autoloader.
     * @param string $class
     */
    static function autoload($class) {
       if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require $class . '.php';
        }
    }
}

?>