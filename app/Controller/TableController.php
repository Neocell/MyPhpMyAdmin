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
     * Function qui permet de rendre la vue Table/index.php.
     * @return void
     */
    public function index($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        $contents = App::getAPI()->getAllContentTable($table);
        $columns = App::getAPI()->getAllColumnTable($table);
        $this->render('table.index', compact('bdd','table','contents','columns'));
    }

    /**
     * Function qui permet de rendre la vue Table/show.php.
     * @return void
     */
    public function show($bdd, $table) {
        App::getAPI()->useBDD($bdd);
        $columns = App::getAPI()->getAllColumnTable($table);
        $this->render('table.show', compact('bdd','table','columns'));
    }

    /**
     * Function qui permet de rendre la vue Table/show.php et qui ajoute une colone a la table.
     * @param string $c_name | Nom de la nouvelle colone 
     * @param string $c_type | Type de la nouvelle colone 
     * @param int $c_size | Taille de la nouvelle colone 
     * @param string $c_defaultValue | Valeur par défault de la nouvelle colone 
     * @param string $c_index | Type de l'index de la nouvelle colone 
     * @param string $bdd | Nom de la base de donnée
     * @param string $table | Nom de la table
     * @return void
     */
    public function addColumn($c_name, $c_type, $c_size, $c_defaultValue, $c_index, $bdd, $table) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->addColumn($c_name, $c_type, $c_size, $c_defaultValue, $c_index, $table);
        $this->show($bdd, $table);
    }

}

?>
