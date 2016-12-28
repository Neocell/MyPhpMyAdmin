<?php

namespace ARG\Controller;
use ARG\App;

/**
 * Class BDDsController 
 * Controller qui s'occupe des pages ayant besoin de faire appel à MySQL.
 */
class BDDsController extends AppController {

    /**
     * Function qui permet de rendre la vue BDDs/index.php 
     * @return void
     */
    public function index() {
        $databases = App::getDB()->query('SHOW DATABASES'); /* Stoke dans $databases la liste des bases de données MySQL */
        $this->render('BDDs.index', compact('databases'));
    }

}
 
?>