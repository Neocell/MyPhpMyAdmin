<?php

namespace ARG\Controller;
use Core\Controller\Controller;

/**
 * Class AppController 
 * Class qui permet d'initialiser la variable viewPath de la Class Controller.
 */
class AppController extends Controller {

    /**
     * Function qui permet d'initialiser le viewPath.
     * @return void
     */
    public function __construct() {
        $this->viewPath = dirname(__DIR__) . '/views';
    }

}
 
?>