
<?php
//$query = 'SELECT COUNT(*) as nbr_Table FROM information_schema.tables WHERE table_schema = \''.$bdd.'\'';
//$arr = $dbh->query($query)->fetch();

?>

<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
</style>

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title"><strong><a href="index.php?p=bdd">Bases de données</a> > <a href="index.php?p=bddshow&bdd=<?= $bdd ?>"><?= $bdd ?></a> > <?= $table ?></strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title" style="width:90%">Informations de la table <strong><?= $table ?></strong></h3>
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
                            <td><?= count($contents);?></td>
                            <td>2</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Contenu de la table <strong><?= $table ?></strong></h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-striped table-hover">
                        <thead>
                            <tr>
                                <?php
    foreach($columns as $column){
        echo "<th><strong>".$column->Field."</strong></th>";
    }
                                ?>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td title="Ajouter une ligne" colspan="<?=count($columns)+2;?>"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                            </tr>
                            <?php
                            foreach($contents as $content)
                            {
                                echo '<tr>';
                                foreach($content as $key => $value)
                                {
                                    if ($value == null)
                                        echo "<td>null</td>";
                                    else
                                        echo "<td>$value</td>";
                                }
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
