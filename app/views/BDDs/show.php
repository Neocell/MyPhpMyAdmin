<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
    .remove { color: #910202; }
</style>


<div class="container" >
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title"><strong><a href="index.php?p=bdd">Bases de données</a> > <?= $bdd ?></strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title" style="width:90%">Information de la base de donnée <strong><?= $bdd ?></strong></h3>
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
                            <td><?= $nb_tables[0]->nbr_Table ?></td>
                            <td>2</td>
                            <td>~ <?= $ms_tables[0]->em ?></td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

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

                    foreach($tables as $table)
                    {
                        echo '<tr>';
                        echo '<td style="padding: 0px;"><a title="Acceder au contenu" style="padding: 8px; display: block;" href="index.php?p=table&bdd='.$bdd.'&table='.$table->Name.'">' . $table->Name . '| Nombre de lignes : ' . $table->Rows . '</a></td>';
                        echo '<td class="text-center"><a style="color: black;" href="index.php?p=unetablecontent&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span></a></td>';
                        echo '<td class="text-center"><a style="color: black;" href="index.php?p=unetablestructure&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span></a></td>';
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
