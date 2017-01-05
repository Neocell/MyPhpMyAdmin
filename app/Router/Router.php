<?php
use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\Controller\TableController;
use ARG\Controller\SQLController;
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
    $controller = new SQLController();
    $controller->index();
});
$router->post('/sql', function(){ 
    $controller = new SQLController();
    $arr = array('database' => $_POST['dbSelected'], 'request' => $_POST['request']);
    $controller->index($arr);
});
$router->get('/table.content/:bdd/:table', function($bdd, $table){ 
    $controller = new TableController();
    $controller->index($bdd, $table);
});
$router->post('/table.content.add', function(){
    $controller = new TableController();
    $controller->addContent($_POST);
});
$router->post('/content.delete', function(){
    $controller = new TableController();
    $controller->deleteContent(
        $_POST['dbName'], 
        $_POST['tableName'], 
        $_POST['contentName']
    );
});
$router->get('/table.structure/:bdd/:table', function($bdd, $table){ 
    $controller = new TableController();
    $controller->show($bdd, $table);
});
$router->post('/table.delete', function(){ 
    $controller = new BDDsController();
    $controller->deleteTable(
        $_POST['dbName'], 
        $_POST['tableName']
    );
});
$router->post('/table.add', function(){ 
    $controller = new BDDsController();
    $controller->addTable(
        $_POST['dbName'], 
        $_POST['addTableName']
    );
});
$router->post('/table.rename', function(){
    $controller = new BDDsController();
    $controller->renameTable(
        $_POST['dbName'], 
        $_POST['currentTableName'], 
        $_POST['newTableName']
    );
});
$router->post('/column.add', function(){
    $controller = new TableController();
    if(isset($_POST['addColumnAI']))
        $c_ai = 'true';
    else 
        $c_ai = 'false';
    $controller->addColumn(
        $_POST['addColumnName'],
        $_POST['addColumnType'],
        $_POST['addColumnSize'],
        $_POST['addColumnDefaultValue'],
        $_POST['addColumnIndex'],
        $c_ai,
        $_POST['dbName'],
        $_POST['tableName']
    );
});
$router->post('/column.delete', function(){
    $controller = new TableController();
    $controller->deleteColumn(
        $_POST['dbName'], 
        $_POST['tableName'], 
        $_POST['columnName']
    );
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
