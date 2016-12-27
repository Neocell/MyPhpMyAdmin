<?php

namespace ARG\Controller;
use ARG\App;

class PagesController extends AppController {

    public function index() {
        $this->render('Pages.accueil');
    }

}
 
?>