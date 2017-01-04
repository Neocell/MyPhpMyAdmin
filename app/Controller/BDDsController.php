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
    public function index() {
        $databases = App::getAPI()->getAllDatabases(); /* Stoke dans $databases la liste des bases de données MySQL */
        $this->render('BDDs.index', compact('databases', 'errors'));
    }

    /**
     * Function qui permet de rendre la vue BDDs/show.php 
     * @param string $bdd | Nom de la base de donnée
     * @return void
     */
    public function show($bdd) {
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
     * Function qui permet de rendre la vue BDDs/show.php et qui modifie le nom d'une table
     * @param string $bdd | Nom de la base de donnée 
     * @param string $oldName | Encient nom de la table
     * @param string $newName | Nouveau nom de la table
     * @return void
     */
    public function renameTable($bdd, $oldName, $newName) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->renameTable($oldName, $newName);
        $this->show($bdd);
    }

    /**
     * Function qui permet de rendre la vue BDDs/index.php et qui ajoute une base de donnée
     * @param string $bdd | Nom de la base de donnée 
     * @return void
     */
    public function addBDD($bdd) {
        App::getAPI()->addBDD($bdd);
        $this->index();
    }

    /**
     * Function qui permet de rendre la vue BDDs/show.php et qui ajoute une table.
     * @param string $bdd | Nom de la base de donnée 
     * @param string $table | Nom de la table
     * @return void
     */
    public function addTable($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->addTable($table);
        $this->show($bdd);
    }

    /**
     * Function qui permet de rendre la vue BDDs/index.php et qui supprime une base de donnée
     * @param string $bdd | Nom de la base de donnée
     * @return void
     */
    public function deleteBDD($bdd) {
        $res = App::getAPI()->deleteBDD($bdd);
        $this->index();
    }

    /**
     * Function qui permet de rendre la vue BDDs/show.php et qui supprime une table.
     * @param string $bdd | Nom de la base de donnée 
     * @param string $table | Nom de la table
     * @return void
     */
    public function deleteTable($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->deleteTable($table);
        $this->show($bdd);
    }

}
 
?>