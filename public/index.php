<?php

require '../configs/router.php';

?>



<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Import du header -->

        <?php
        
        require '../app/views/templates/header.php';
        
        ?>

        <!-- ---------------- -->


        <!-- Import du corps -->

        <?php

        if ($p === 'accueil') {
            require '../app/views/accueil.php';
        } else if ($p === 'bdd') {
            require '../app/views/bdd.php';
        } else if ($p === 'sql') {
            require '../app/views/sql.php';
        } else {
            require '../app/views/404.php';
        }

        ?>

        <!-- --------------- -->



        <script src="../public/assets/js/jquery-3.1.1.min.js"></script>
        <script src="../public/assets/js/bootstrap.min.js"></script>
    </body>
</html>
