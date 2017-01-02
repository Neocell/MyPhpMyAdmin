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
     * @param json $errors | Pramétre optionnel, contient les erreurs envoyer a la vue. 
     * @return void
     */
    public function index($errors = NULL) {
        var_dump($errors);
        $databases = App::getAPI()->getAllDatabases(); /* Stoke dans $databases la liste des bases de données MySQL */
        $this->render('BDDs.index', compact('databases', 'errors'));
    }

    /**
     * Function qui permet de rendre la vue BDDs/show.php 
     * @param string $bdd | Nom de la base de donnée
     * @return void
     */
    public function show($bdd, $errors = NULL) {
        App::getAPI()->useBDD($bdd);
        $nb_tables = App::getAPI()->countTables();
        $ms_tables = App::getAPI()->memorySpaceDatabase();
        $tables = App::getAPI()->getAllTables();
        $this->render('BDDs.show', compact('bdd','nb_tables', 'ms_tables', 'tables'));
    }

    /**
     * Function qui permet de rendre la vue BDDs/index.php et qui modifie le nom d'une base de donnée
     * @param string $oldName | Encient nom de la base de donnée 
     * @param string $newName | Nouveau nom de la base de donnée 
     * @return void
     */
    public function renameBDD($oldName, $newName) {
        App::getAPI()->renameBDD($oldName, $newName);
        $this->index();
    }

    /**
     * Function qui permet de rendre la vue BDDs/index.php et qui supprime une base de donnée
     * @param string $bdd | Nom de la base de donnée
     * @return void
     */
    public function deleteBDD($bdd) {
        $res = App::getAPI()->deleteBDD($bdd);
        if($res['succes'])  
            $this->index();
        else 
            $this->index(json_encode($res));
    }

}
 
?>