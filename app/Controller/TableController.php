<?php

namespace ARG\Controller;
use ARG\Object\Table;
use ARG\App;

/**
 * Class TableController
 * Controller qui s'occupe des pages ayant besoin de faire appel à une base de donnée 
 *  et plus particuliérement avec a une table.
 */
class TableController extends AppController {

    /**
     * Function qui permet de rendre la vue Table/index.php
     * @return void
     */
    public function index($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        $contents = App::getAPI()->getAllContentTable($table);
        $columns = App::getAPI()->getAllColumnNameTable($table);
        var_dump($contents);
        $this->render('table.index', compact('bdd','table','contents','columns'));
    }

}

?>
