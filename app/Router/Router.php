<?php
use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\Controller\TableController;
use ARG\App;
use Core\Router\Router;

/* Import du corps */

if ($_GET['p'] != "") { $p = $_GET['p'];  } else { $p = "accueil"; }

$router = new Router($p);

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