<?php

namespace ARG\Controller;
use ARG\Object\Table;
use ARG\App;

/**
 * Class BDDsController
 * Controller qui s'occupe des pages ayant besoin de faire appel à MySQL.
 */
class TableController extends AppController {

    /**
     * Function qui permet de rendre la vue BDDs/index.php
     * @return void
     */
    public function index($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        $contents = App::getAPI()->getAllContentTable($table);
        $columns = App::getAPI()->getAllColumnNameTable($table);
        $this->render('table.index', compact('bdd','table','contents','columns'));
    }

}

?>
