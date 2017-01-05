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
    public function addColumn($c_name, $c_type, $c_size, $c_defaultValue, $c_index, $c_ai, $bdd, $table) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->addColumn($c_name, $c_type, $c_size, $c_defaultValue, $c_index, $c_ai, $table);
        $this->show($bdd, $table);
    }

    /**
     * Function qui permet de rendre la vue Table/index.php et qui ajoute un contenu a la table.
     * @param array $array | Contient les champs de la table
     * @return void
     */
    public function addContent($datas) {
        $elements = array('dbName', 'tableName');
        foreach($elements as $element) {
            foreach($datas as $key => $val) {
                if($element === $key){
                    $config[$key] = $datas[$key];
                    unset($datas[$key]);
                }
            }
        }
        App::getAPI()->useBDD($config['dbName']);
        App::getAPI()->addContent($config['tableName'], $datas);
        $this->index($config['dbName'], $config['tableName']);
    }

    /**
     * Function qui permet de rendre la vue Table/show.php et qui supprime une colone.
     * @param string $bdd | Nom de la base de donnée
     * @param string $table | Nom de la table
     * @param string $column | Nom de la colone
     * @return void
     */
    public function deleteColumn($bdd, $table, $column) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->deleteColumn($table, $column);
        $this->show($bdd, $table);
    }

    /**
     * Function qui permet de rendre la vue Table/index.php et qui supprime du contenu.
     * @param string $bdd | Nom de la base de donnée
     * @param string $table | Nom de la table
     * @param string $id | Clef primaire du contenue à supprimer
     * @return void
     */
    public function deleteContent($bdd, $table, $id) {
        App::getAPI()->useBDD($bdd);
        App::getAPI()->deleteContent($table, $id);
        $this->index($bdd, $table);
    }

}

?>
