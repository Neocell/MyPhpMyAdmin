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
                <h3 class="panel-title" style="width:90%">Informations de la base de donnée <strong><?= $bdd ?></strong></h3>
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
                            <td>-</td>
                            <td>~ <?php if(isset($ms_tables[0])) { echo $ms_tables[0]->em; } else { echo 0; }?></td>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <?php
    if ($bdd == "information_schema" || $bdd == "performance_schema" || $bdd == "mysql" || $bdd == "sys")
    {
        foreach($tables as $table)
        {
                            ?>
                            <tr>
                                <td style="padding: 0px;">
                                    <a title="Acceder au contenu" style="padding: 8px; display: block;" href="index.php?p=table.content/<?= $bdd ?>/<?= $table->Name ?>"><?= $table->Name ?></a></td>
                                <td class="text-center">
                                    <a style="color: black;" href="index.php?p=table.content/<?= $bdd ?>/<?= $table->Name ?>">
                                        <span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a style="color: black;" href="index.php?p=table.structure/<?= $bdd ?>/<?= $table->Name ?>">
                                        <span title="Acceder à la structure" class="glyphicon glyphicon-list"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span>
                                </td>
                                <td class="text-center">
                                    <span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span>
                                </td>
                            <tr>
                                <?php  }

    } else {
        echo '<tr><td title="Ajouter une table" style="padding: 0px;" colspan="5" class="text-center"><a onclick=\'addTable("'.$bdd .'")\' style="padding: 8px;color:black; display: block;" data-toggle="modal" href="#myModalAddTable"><span class="glyphicon glyphicon-plus"></span></a></td></tr>';
        echo '<tr>';
        foreach($tables as $table)
        {
                                ?>
                                <td style="padding: 0px;">
                                    <a title="Acceder au contenu" style="padding: 8px; display: block;" href="index.php?p=table.content/<?= $bdd ?>/<?= $table->Name ?>"><?= $table->Name ?> </a>
                                </td>
                                <td class="text-center">
                                    <a style="color: black;" href="index.php?p=table.content/<?= $bdd ?>/<?= $table->Name ?>">
                                        <span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a style="color: black;" href="index.php?p=table.structure/<?= $bdd ?>/<?= $table->Name ?>"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a style="color:black;" onclick='renameTable("<?= $bdd ?>","<?= $table->Name ?>")' data-toggle="modal" href="#myModalRenameTable">
                                        <span title="Renommer la table" class="glyphicon glyphicon-pencil rename"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a style="color:black;" onclick='removeTable("<?= $bdd ?>","<?= $table->Name ?>")' data-toggle="modal" href="#myModalRemoveTable">
                                        <span title="Supprimer la table" class="glyphicon glyphicon-trash remove"></span>
                                    </a>
                                </td>
                            <tr>
                                <?php
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
<?php require 'Modals/RenameTable.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/RemoveTable.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/AddTable.php'; ?>
