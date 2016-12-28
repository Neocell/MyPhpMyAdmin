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

$table = $_GET['table'];

?>

<?php

class Ligne {
    private $Name;

    //function __set($prop, $value) { }

    public function get_name()
    {
        return $this->Name;
    }
}

?>

<?php
$query = 'SELECT COUNT(*) as nbr_Table FROM information_schema.tables WHERE table_schema = \''.$bdd.'\'';
$arr = $dbh->query($query)->fetch();

?>

<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
</style>

<div class="container" style=" margin-bottom: 25px;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title" style="width:90%"><strong><?=$bdd ?> > <?=$table ?></strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container" style=" margin-bottom: 25px;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title" style="width:90%">Information de la table <strong><?=$table ?></strong></h3>
                <span class="pull-right clickable panel-collapsed" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-down"></i></span>
            </div>
            <div class="panel-body" style="display: none;">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre de lignes</th>
                            <th class="text-center">Date de création</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $arr[0] ?></td>
                            <td>2</td>
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
                <h3 class="panel-title" style="width:90%">Contenu de la table <strong><?=$table ?></strong></h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td title="Ajouter une ligne" colspan="5"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                        </tr>
                        <?php
//                    $stmt = $dbh->prepare('use '.$bdd.';');
//                    $stmt->execute();
//                    $lignes = $dbh->query('SELECT * FROM '.$table.';')->fetchAll(PDO::FETCH_CLASS, 'Ligne');
//                    var_dump($lignes);
//                    foreach($lignes as $ligne)
//                    {
//                        echo '<tr>';
//                        echo '<td style="padding: 0px;"><a title="Acceder au contenu" style="padding: 8px; display: block;" href="#">' . $ligne->get_name() . '</a></td>';
//                        echo '<td class="text-center"><span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span></td>';
//                        echo '<td class="text-center"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span></td>';
//                        echo '<td class="text-center"><span title="Renommer la table" class="glyphicon glyphicon-pencil rename"></span></td>';
//                        echo '<td class="text-center"><span title="Supprimer la table" class="glyphicon glyphicon-trash remove"></span></td>';
//                        echo '<tr>';
//                    }
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
