<?php

//Verifications de la présence d'une clé primaire pour editer une ligne
$edition = false;
foreach ($columns as $uneColumn)
{
    if ($uneColumn->Key == 'PRI')
        $edition = true;
}
?>


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
        <?php if(!$edition) { ?>
        <div class="alert alert-warning">
            <strong>Attention !</strong>  La sélection courante ne contient pas de colonne unique. Les liens d'édition et de suppression ne sont donc pas disponibles..
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Contenu de la table <strong><?= $table ?></strong></h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered  table-striped table-hover">
                        <thead>
                            <tr >
                                <?php
    $colnum = 0;
    foreach($columns as $column){

        if ($column->Key == 'PRI')
        {
            echo "<th><strong class=\"uneColonne\">".$column->Field."</strong><i style=\"color: #c6ad15; margin-left: 10px;\" class=\"fa fa-key\" aria-hidden=\"true\"></i></th>";
            $lenom = $columns[$colnum]->Field;

        }
        else
            echo "<th><strong class=\"uneColonne\">".$column->Field."</strong></th>";
        $colnum += 1;
    }
                                ?>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($bdd == "information_schema" || $bdd == "performance_schema" || $bdd == "mysql" || $bdd == "sys")
                            {

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
                                    echo '<td class="text-center"><span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span></td>';
                                    echo '<td class="text-center"><span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span></td>';
                                    echo '<tr>';
                                }
                            } else {
                                $colspannbr =  count($columns)+2;
                                echo '<tr><td style="padding: 0px;" title="Ajouter une ligne" colspan=" ' . $colspannbr . ' "  class="text-center"><a data-toggle="modal" href="#myModalAddContent"><span class="glyphicon glyphicon-plus" style="padding: 8px;color:black; display: block;"></span></a></td></tr>';

                                foreach($contents as $content)
                                {

                                    echo '<tr>';
                                    foreach($content as $key => $value)
                                    {
                                        if ($value == null)
                                            echo "<td>null</td>";
                                        else
                                            echo "<td class=\"unevaleur\">$value</td>";
                                    }

                                    if (!$edition) {
                                        echo '<td class="text-center"><span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span></td>';
                                        echo '<td class="text-center"><span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span></td>';
                                    } else {
                                        echo '<td class="text-center"><a style="color:black;" data-toggle="modal" href="#myModalEditContent" onclick=\'editContent(this)\'><span title="Editer la ligne" class="glyphicon glyphicon-pencil rename"></span></a></td>';
                                        echo '<td class="text-center"><a style="color:black;" onclick=\'removeContent("'.$bdd.'","'.$table.'","'.$content->$lenom.'")\' data-toggle="modal" href="#myModalRemoveContent"><span title="Supprimer la ligne" class="glyphicon glyphicon-trash remove"></span></a></td>';
                                    }


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
<?php require 'Modals/EditContent.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/RemoveContent.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/AddContent.php'; ?>
