<?php

namespace ARG\Controller;
use ARG\Object\Table;
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
        $databases = App::getAPI()->getAllDatabases(); /* Stoke dans $databases la liste des bases de données MySQL */
        $this->render('BDDs.index', compact('databases'));
    }

    public function show($bdd) {
        App::getAPI()->useBDD($bdd);
        $nb_tables = App::getAPI()->countTables();
        $ms_tables = App::getAPI()->memorySpaceDatabase();
        $tables = App::getAPI()->getAllTables();
        $this->render('BDDs.show', compact('bdd','nb_tables', 'ms_tables', 'tables'));
    }

}
 
?>