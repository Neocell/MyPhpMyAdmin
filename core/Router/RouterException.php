<?php

namespace Core\Router;

/**
 * Class RouterException
 */
class RouterException extends \Exception
{
    public function __construct(){
        header('Location: http://localhost/citrusrequest/public/index.php?p=not_found');
        exit;
    }
}
