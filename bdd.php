<?php
try {
    $dbh = new PDO('mysql:host=localhost;', "root", "");    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

class Database
{
    private $Database;
    
    public function get_database()
    {
        return $this->Database;
    }
}

?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style type="text/css">
            .glyphicon:hover { cursor: pointer; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">myPhpMyAdmin</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Accueil</a></li>
                        <li class="active"><a href="bdd.html">Base de données</a></li>
                        <li><a href="sql.html">SQL</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bases de données</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td colspan="3"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                                </tr>
                                <?php
                                $databases = $dbh->query('SHOW DATABASES')->fetchAll(PDO::FETCH_CLASS, 'Database');
                                foreach($databases as $database)
                                {
                                    echo '<tr>';
                                    echo '<td>' . $database->get_database() . '</td>';
                                    echo '<td class="text-center"><span class="glyphicon glyphicon-pencil rename"></span></td>';
                                    echo '<td class="text-center"><span class="glyphicon glyphicon-trash remove"></span></td>';
                                    echo '<tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <!-- Modal rename bdd -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal remove bdd -->
        <div class="modal fade" id="myModalRemove">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Suppression de la Base de donnée</h4>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous vraiment supprimer cette Base de donnée&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                        <button type="button" class="btn btn-primary">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(".remove").click(function() {
                $(this).parent().parent().addClass("danger");
                $('#myModalRemove').modal('toggle');
            });

            $(".rename").click(function() {
                $('#myModal').modal('toggle');
            });



        </script>

    </body>
</html>