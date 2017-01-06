<?php

namespace Core\Router;

/**
 * Class RouterException
 */
class RouterException extends \Exception
{
    public function __construct(){
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php?p=not_found';
        header("Location: http://$host$uri/$extra");
        exit;
    }
}
