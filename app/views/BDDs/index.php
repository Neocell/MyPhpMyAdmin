<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
    .remove { color: #910202; }
</style>

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
                                <td colspan="3"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                            </tr>
                            <?php
                            foreach($databases as $data)
                            {
                                echo '<tr>';
                                echo '<td style="padding: 0px;"><a title="Accéder à la base de donnée" style="padding: 8px; display: block;" href="index.php?p=bddshow&bdd='. $data->Database .'">' . $data->Database . '</a></td>';
                                echo '<td class="text-center"><a style="color:black;" onclick=\'renameBDD("'.$data->Database.'")\' data-toggle="modal" href="#myModalRename"><span title="Renommer la base de donnée" class="glyphicon glyphicon-pencil rename"></span></a></td>';
                                echo '<td class="text-center"><a style="color:black;" onclick=\'removeBDD("'.$data->Database.'")\' data-toggle="modal" href="#myModalRemove"><span title="Supprimer la base de donnée" class="glyphicon glyphicon-trash remove"></span></a></td>';
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

<!-- Modal rename bdd -->
<?php require 'Modals/RenameBDD.php'; ?>

<!-- Modal remove bdd -->
<?php require 'Modals/RemoveBDD.php'; ?>

<script>
     //Permet d'ouvrir ou fermer un panel
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
