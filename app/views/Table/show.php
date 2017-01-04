<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title"><strong><a href="index.php?p=bdd">Bases de données</a> > <a href="index.php?p=bdd.show/<?= $bdd ?>"><?= $bdd ?></a> > <?= $table ?></strong></h3>
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
                            <th class="text-center">Nombre de colonnes</th>
                            <th class="text-center">Date de création</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td><?= count($columns); ?></td>
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
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Null</th>
                                <th>Key</th>
                                <th>Default</th>
                                <th>Extra</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    if ($bdd == "information_schema" || $bdd == "performance_schema" || $bdd == "mysql" || $bdd == "sys")
    {
        foreach($columns as $column)
        {
            echo '<tr>';
            foreach($column as $key => $value)
            {
                if ($value == null)
                    echo "<td>null</td>";
                else
                    echo "<td>$value</td>";
            }
            echo '<td class="text-center"><span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span></td>';
            echo '<td class="text-center"><span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span></td>';

            echo '<tr>';
        }
    } else {
        echo '<tr><td title="Ajouter une ligne" style="padding: 0px;" colspan="10"  class="text-center"><a onclick=\'addStructure("'.$bdd .'","'.$table .'")\' style="padding: 8px;color:black; display: block;" data-toggle="modal" href="#myModalAddColumn"><span class="glyphicon glyphicon-plus"></span></a></td></tr>';
//        var_dump($columns);

        foreach($columns as $column)
        {
            echo '<tr>';
            foreach($column as $key => $value)
            {
                if ($value == null)
                    echo "<td>null</td>";
                else
                    echo "<td>$value</td>";
            }
            echo '<td class="text-center"><span title="Renommer la table" class="glyphicon glyphicon-pencil rename"></span></td>';
            echo '<td class="text-center"><a style="color:black;" onclick=\'removeColumn("'.$bdd.'","'.$table.'","'.$column->Field.'")\' data-toggle="modal" href="#myModalRemoveColumn"><span title="Supprimer la colonne" class="glyphicon glyphicon-trash remove"></span></a></td>';




            echo '<tr>';
        }
    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal rename bdd -->
<?php //require 'Modals/RenameContent.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/RemoveStructure.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/AddStructure.php'; ?>
