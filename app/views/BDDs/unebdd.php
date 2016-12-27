<?php
try {
    $dbh = new PDO('mysql:host=localhost;', "root", "");
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



?>
<?php

$bdd = $_GET['bdd'];

?>

<?php

class Table {
    private $Name;

    function __set($prop, $value) { }

    public function get_name()
    {
        return $this->Name;
    }
}

?>

<?php
$query = 'SELECT COUNT(*) as nbr_Table FROM information_schema.tables WHERE table_schema = \''.$bdd.'\'';
$arr = $dbh->query($query)->fetch();
//var_dump($arr);
$query2 = 'SELECT Round(Sum(data_length + index_length) / 1024 / 1024, 1) FROM information_schema.tables WHERE table_schema = \''.$bdd.'\' GROUP BY table_schema; ';
$arr2 = $dbh->query($query2)->fetch();
//var_dump($arr2);

$query3 ='SELECT TABLE_SCHEMA, CREATE_TIME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = \''. $bdd .'\';';
$arr3 = $dbh->query($query3)->fetch();
//var_dump($arr3);

?>

<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
    tr td:first-child:hover {cursor: pointer; }
</style>
<div class="container" style=" margin-bottom: 25px;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title" style="width:90%">Information de la base de donnée <strong><?=$bdd ?></strong></h3>
                <span class="pull-right clickable panel-collapsed" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-down"></i></span>
            </div>
            <div class="panel-body" style="display: none;">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre de tables</th>
                            <th class="text-center">Date de création</th>
                            <th class="text-center">Espace mémoire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $arr[0] ?></td>
                            <td>2</td>
                            <td>~ <?= $arr2[0] ?></td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Tables de <strong><?=$bdd ?></strong></h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td title="Ajouter une table" colspan="5"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                        </tr>
                        <?php
    $stmt = $dbh->prepare('use '.$bdd.';');
                    $stmt->execute();
                    $tables = $dbh->query('SHOW table status; ')->fetchAll(PDO::FETCH_CLASS, 'Table');

                    foreach($tables as $table)
                    {
                        echo '<tr data-database="' . $table->get_name() . '">';
                        echo '<td title="Acceder au contenu">' . $table->get_name() . '</td>';
                        echo '<td class="text-center"><span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span></td>';
                        echo '<td class="text-center"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span></td>';
                        echo '<td class="text-center"><span title="Renommer la table" class="glyphicon glyphicon-pencil rename"></span></td>';
                        echo '<td class="text-center"><span title="Supprimer la table" class="glyphicon glyphicon-trash remove"></span></td>';
                        echo '<tr>';
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', 'span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });

</script>
