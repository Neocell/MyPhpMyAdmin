<?php
require '../configs/router.php';

use ARG\Controller\BDDsController;
use ARG\Controller\PagesController;
use ARG\App;
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
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

        require '../app/Controller/BDDsController.php';

        if ($p === 'accueil') {
            $controller = new PagesController();
            $controller->index();
        } else if ($p === 'bdd') {
            $controller = new BDDsController();
            $controller->index();
        } else if ($p === 'unebdd') {                  // <- Temporaire
            require '../app/views/BDDs/unebdd.php';       // <-
        } else if ($p === 'sql') {
            require '../app/views/BDDs/sql.php';
        } else {
            require '../app/views/Pages/404.php';
        }

        ?>



        <script src="../public/assets/js/bootstrap.min.js"></script>
    </body>
</html>
