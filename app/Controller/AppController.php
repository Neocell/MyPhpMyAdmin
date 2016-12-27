<?php

namespace ARG\Controller;
use Core\Controller\Controller;

class AppController extends Controller {

    public function __construct() {
        $this->viewPath = dirname(__DIR__) . '\\views\\';
    }

}
 
?>