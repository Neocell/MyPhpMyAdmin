<?php

namespace ARG\Controller;
use ARG\App;

class BDDsController extends AppController {

    public function index() {
        $databases = App::getDB()->query('SHOW DATABASES');
        $this->render('BDDs.index', compact('databases'));
    }

    public function edit() {

    }

    public function show() {

    }

}
 
?>