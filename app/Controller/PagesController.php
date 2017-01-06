<?php

namespace ARG\Controller;
use ARG\App;

/**
 * Class PagesController 
 * Controller qui s'occupe des pages qui n'ont pas besoin de traitement particulier.
 */
class PagesController extends AppController {

    /**
     * Function qui permet de rendre la vue accueil.php
     * @return void
     */
    public function index() {
        $this->render('Pages.accueil');
    }

    /**
     * Function qui permet de rendre la vue 404.php
     * @return void
     */
    public function notFound() {
        $this->render('Pages.404');
    }

}
 
?>