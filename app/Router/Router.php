<?php
use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\Controller\TableController;
use ARG\App;
use Core\Router\Router;

/* Import du corps */

if (isset($_GET['p'])) { 
    $p = $_GET['p'];  
} else { 
    $p = "accueil"; 
}

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
$router->post('/bdd.delete', function(){
    $controller = new BDDsController();
    $controller->deleteBDD($_POST['dbName']);
});
$router->post('/bdd.add', function(){
    $controller = new BDDsController();
    $controller->addBDD($_POST['addDbName']);
});
$router->post('/bdd.rename/:currentDbName/:newDbName', function($currentDbName, $newDbName){
    $controller = new BDDsController();
    $controller->renameBDD($currentDbName, $newDbName);
});

$router->run();
