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
        $databases = App::getDB()->query('SHOW DATABASES'); /* Stoke dans $databases la liste des bases de données MySQL */
        $this->render('BDDs.index', compact('databases'));
    }

    public function show($bdd) {
        $query = 'SELECT COUNT(*) as nbr_Table FROM information_schema.tables WHERE table_schema = \''.$bdd.'\'';
        $arr = App::getDB()->query($query);

        $query2 = 'SELECT Round(Sum(data_length + index_length) / 1024 / 1024, 1) FROM information_schema.tables WHERE table_schema = \''.$bdd.'\' GROUP BY table_schema; ';
        $arr2 = App::getDB()->query($query2);

        $query3 ='SELECT TABLE_SCHEMA, CREATE_TIME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = \''. $bdd .'\';';
        $arr3 = App::getDB()->query($query3);

        $stmt = App::getDB()->prepare('use '.$bdd.';');
        $tables = App::getDB()->query('SHOW table status;');

        $this->render('BDDs.show', compact('bdd','arr', 'arr2', 'arr3', 'tables'));
    }

}
 
?>