<style type="text/css">
    .glyphicon:hover { cursor: pointer; }
    .clickable: hover { cursor: pointer; }
</style>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Bases de données</h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td colspan="3"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                        </tr>
                        <?php
                        foreach($databases as $data)
                        {
                            echo '<tr>';
                            echo '<td style="padding: 0px;"><a  title="Accéder à la base de donnée" style="padding: 8px; display: block;" href="index.php?p=unebdd&bdd='. $data .'">' . $data . '</a></td>';
                            echo '<td class="text-center"><span title="Renommer la base de donnée" class="glyphicon glyphicon-pencil rename"></span></td>';
                            echo '<td class="text-center"><span title="Supprimer la base de donnée" class="glyphicon glyphicon-trash remove"></span></td>';
                            echo '<tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php// require 'sql.php'; ?>  <!--     <- Pourquoi ici ?     -->
    </div>
</div>

<script>

    function unebdd(e) {
        window.location = "index.php?p=unebdd&bdd="+e;
    }

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
