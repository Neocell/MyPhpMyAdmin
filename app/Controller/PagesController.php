<?php

namespace ARG\Controller;
use ARG\App;

/**
 * Class PagesController 
 * Controller qui s'occupe des pages qui n'ont pas besoin de traitement particulier.
 */
class PagesController extends AppController {

    public function index() {
        $this->render('Pages.accueil');
    }

}
 
?>