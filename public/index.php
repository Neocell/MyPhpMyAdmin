<?php
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT"); // une date d'expiration dans le passé
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // la date/heure de génération de la page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // désactivation du cache
header("Cache-Control: post-check=0, pre-check=0", false); // gestion du cache de IE
header("Pragma: no-cache"); // gestion du cache de IE
use ARG\App;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>myPhpMyAdmin</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/fontsGoogle.css">
        <script src="assets/js/jquery-3.1.1.min.js"></script>
    </head>
    <body>


        <?php //echo $_SERVER['DOCUMENT_ROOT']; ?>

        <?php
        /* Autoloader */
        require '../app/App.php';
        App::ARGload();

        /* Import du header */
        require '../app/views/templates/header.php';

        /* Import du router */
        require '../app/Router/Router.php';

        ?>

        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Importation du script d'ouverture et fermeture d'un panel -->
        <script src="assets/js/panelToggle.js"></script>
    </body>
</html>
