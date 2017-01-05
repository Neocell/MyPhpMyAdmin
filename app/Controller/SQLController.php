<?php

namespace ARG\Controller;
use ARG\App;

/**
 * SQLController
 */
class SQLController extends AppController
{
    
    /**
     * Function qui permet de rendre la vue BDDs/sql.php 
     * @param string $request | Pramétre optionnel, contient la requete à executer.
     * @return void
     */
    public function index($array = NULL) {
        if(isset($array)){
            $databases = App::getAPI()->getAllDatabases();
            App::getAPI()->useBDD($array['database']);
            $result = App::getAPI()->getSQLResult($array);
            $this->render('SQL.index', compact('result', 'databases'));
        } else {
            $databases = App::getAPI()->getAllDatabases();
            $this->render('SQL.index', compact('databases'));
        }
    }
}
