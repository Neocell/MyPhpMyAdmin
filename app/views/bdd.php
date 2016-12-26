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