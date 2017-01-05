<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h3 class="panel-title"><strong>Bases de données</strong></h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Bases de données</h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <td colspan="3" style="padding: 0px;"  class="text-center"><a style="padding: 8px;color:black; display: block;" data-toggle="modal" href="#myModalAddBdd"><span class="glyphicon glyphicon-plus"></span></a></td>
                            </tr>
                            <?php
                            foreach($databases as $data)
                            {
                                if ($data->Database == "information_schema" || $data->Database == "performance_schema" || $data->Database == "mysql" || $data->Database == "sys")
                                {
                                    echo '<tr>';
                                    echo '<td style="padding: 0px;"><a title="Accéder à la base de donnée" style="padding: 8px; display: block;" href="index.php?p=bdd.show/'. $data->Database .'">' . $data->Database . '</a></td>';
                                    echo '<td class="text-center"><span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span></td>';
                                    echo '<td class="text-center"><span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span></td>';
                                    echo '<tr>';
                                }
                                else {
                                    echo '<tr>';
                                    echo '<td style="padding: 0px;"><a title="Accéder à la base de donnée" style="padding: 8px; display: block;" href="index.php?p=bdd.show/'. $data->Database .'">' . $data->Database . '</a></td>';
                                    echo '<td class="text-center"><a style="color:black;" onclick=\'renameBDD("'.$data->Database.'")\' data-toggle="modal" href="#myModalRenameBdd"><span title="Renommer la base de donnée" class="glyphicon glyphicon-pencil rename"></span></a></td>';
                                    echo '<td class="text-center"><a style="color:black;" onclick=\'removeBDD("'.$data->Database.'")\' data-toggle="modal" href="#myModalRemoveBdd"><span title="Supprimer la base de donnée" class="glyphicon glyphicon-trash remove"></span></a></td>';
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
<?php require 'Modals/RenameBDD.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/RemoveBDD.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/AddBDD.php'; ?>
