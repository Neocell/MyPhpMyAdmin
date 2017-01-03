<?php
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); // une date d'expiration dans le passé
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // la date/heure de génération de la page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // désactivation du cache
header("Cache-Control: post-check=0, pre-check=0", false); // gestion du cache de IE
header("Pragma: no-cache"); // gestion du cache de IE

use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\Controller\TableController;
use ARG\App;
use Core\Router\Router;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>myPhpMyAdmin</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script src="assets/js/jquery-3.1.1.min.js"></script>
    </head>
    <body>

        <?php
        /* Autoloader */
        require '../app/App.php';
        App::ARGload();

        /* Import du header */
        require '../app/views/templates/header.php';

        /* Import du corps */
        $router = new Router($_GET['p']); 

        $router->get('/accueil', function(){ 
            $controller = new PagesController();
            $controller->index(); 
        }); 
        $router->get('/sql', function(){ 
            require '../app/views/BDDs/sql.php';
        });
        $router->get('/table.content/:bdd/:table', function($bdd, $table){ 
            $controller = new TableController();
            $controller->index($bdd, $table);
        });
        $router->get('/table.structure/:bdd/:table', function($bdd, $table){ 
            $controller = new TableController();
            $controller->show($bdd, $table);
        });
        $router->get('/bdd', function(){ 
            $controller = new BDDsController();
            $controller->index();
        });
        $router->get('/bdd.show/:db', function($db){
            $controller = new BDDsController();
            $controller->show($db);
        });
        $router->post('/bdd.delete/:dbName', function($dbName){
            $controller = new BDDsController();
            $controller->deleteBDD($dbName);
        });
        $router->post('/bdd.add/:addDbName', function($addDbName){
            $controller = new BDDsController();
            $controller->addBDD($addDbName);
        });
        $router->post('/bdd.rename/:currentDbName/:newDbName', function($currentDbName, $newDbName){
            $controller = new BDDsController();
            $controller->renameBDD($currentDbName, $newDbName);
        });

        $router->run(); 

        ?>

        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Importation du script d'ouverture et fermeture d'un panel -->
        <script src="assets/js/panelToggle.js"></script>
    </body>
</html>
