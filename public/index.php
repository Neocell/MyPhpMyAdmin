<?php

header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); // une date d'expiration dans le passé
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // la date/heure de génération de la page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // désactivation du cache
header("Cache-Control: post-check=0, pre-check=0", false); // gestion du cache de IE
header("Pragma: no-cache"); // gestion du cache de IE

require '../configs/router.php';

use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\Controller\TableController;
use ARG\App;
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>myPhpMyAdmin</title>
        <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/css/styles.css">
        <script src="../public/assets/js/jquery-3.1.1.min.js"></script>
    </head>
    <body>

        <!-- Autoloader -->
        <?php

        require '../app/App.php';
        App::ARGload();

        ?>

        <!-- Import du header -->
        <?php

        require '../app/views/templates/header.php';

        ?>


        <!-- Import du corps -->
        <?php

        if ($p === 'accueil') {
            $controller = new PagesController();
            $controller->index();
        } else if ($p === 'bdd') {
            $controller = new BDDsController();
            $controller->index();
        } else if ($p === 'bdd.delete') {
            $controller = new BDDsController();
            $controller->deleteBDD($_POST['dbName']);
        } else if ($p === 'bdd.add') {
            $controller = new BDDsController();
            $controller->addBDD($_POST['addDbName']);
        } else if ($p === 'bdd.delete.json') {
            echo $_GET['response'];
        } else if ($p === 'bddshow') {                  
            $controller = new BDDsController();
            $controller->show($_GET['bdd']);
        } else if ($p === 'sql') {
            require '../app/views/BDDs/sql.php';
        } else if ($p === 'tablecontent') {
            $controller = new TableController();
            $controller->index($_GET['bdd'], $_GET['table']);
        } else if ($p === 'tablestructure') {
            $controller = new TableController();
            $controller->show($_GET['bdd'], $_GET['table']);
        } else {
            require '../app/views/Pages/404.php';
        }

        ?>

        <script src="../public/assets/js/bootstrap.min.js"></script>
        <!-- Importation du script d'ouverture et fermeture d'un panel -->
        <script src="../public/assets/js/panelToggle.js"></script>
    </body>
</html>
