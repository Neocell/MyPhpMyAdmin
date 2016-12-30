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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <?php

    if ($bdd == "information_schema" || $bdd == "performance_schema" || $bdd == "mysql" || $bdd == "sys")
    {
        foreach($tables as $table)
        {

            echo '<tr>';
            echo '<td style="padding: 0px;"><a title="Acceder au contenu" style="padding: 8px; display: block;" href="index.php?p=tablecontent&bdd='.$bdd.'&table='.$table->Name.'">' . $table->Name . '</a></td>';
            echo '<td class="text-center"><a style="color: black;" href="index.php?p=tablecontent&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span></a></td>';
            echo '<td class="text-center"><a style="color: black;" href="index.php?p=tablestructure&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span></a></td>';
            echo '<td class="text-center"><span title="Renommage impossible" class="glyphicon glyphicon-pencil glypdisaled"></span></td>';
            echo '<td class="text-center"><span title="Suppression impossible" class="glyphicon glyphicon-trash glypdisaled"></span></td>';
            echo '<tr>';
        }

    } else {
        foreach($tables as $table)
        {
            echo '<tr><td title="Ajouter une table" colspan="5"  class="text-center"><span class="glyphicon glyphicon-plus"></td></tr>';
            echo '<tr>';
            echo '<td style="padding: 0px;"><a title="Acceder au contenu" style="padding: 8px; display: block;" href="index.php?p=tablecontent&bdd='.$bdd.'&table='.$table->Name.'">' . $table->Name . '</a></td>';
            echo '<td class="text-center"><a style="color: black;" href="index.php?p=tablecontent&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder au contenu" class="glyphicon glyphicon-list-alt"></span></a></td>';
            echo '<td class="text-center"><a style="color: black;" href="index.php?p=tablestructure&bdd='.$bdd.'&table='.$table->Name.'"><span title="Acceder à la structure" class="glyphicon glyphicon-list"></span></a></td>';
            echo '<td class="text-center"><span title="Renommer la table" class="glyphicon glyphicon-pencil rename"></span></td>';
            echo '<td class="text-center"><span title="Supprimer la table" class="glyphicon glyphicon-trash remove"></span></td>';
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
