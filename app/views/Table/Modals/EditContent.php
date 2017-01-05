<div class="modal fade" id="myModalEditContent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="formContentEdit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edition d'une ligne dans la table</h4>
                </div>
                <div class="modal-body" id="formContentEditForm">
                    <?php var_dump($columns); ?>
                    <?php foreach($columns as $column) {
                    ?>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label"><strong><?php echo $column->Field . "</strong> ".$column->Type; ?></label>
                            <div class="col-xs-10">
                                <input class="form-control" type="text" name="">
                            </div>
                            </div>
                        <?php } ?>



                    </div>
                    <div>
                    <input type="hidden" name="dbName" value="<?= $bdd ?>">
                    <input type="hidden" name="tableName" value="<?= $table ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Insérer</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>

    <script type="text/javascript">

        function editContent(vare) {
            console.log($(vare).parent().parent().children());
        }
        //
//        $( "#formContentAdd" ).submit(function( event ) {
//            console.log(document.getElementById('inputAddContent'));
//            event.preventDefault();
//        });


    </script>
