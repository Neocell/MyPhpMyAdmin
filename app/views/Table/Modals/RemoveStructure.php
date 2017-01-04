<div class="modal fade" id="myModalRemoveColumn">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?p=column.delete" method="post" id="formColumnRemove">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Suppression d'une Colonne</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer la colonne <strong id="columnRemove">{name}</strong></p>
                </div>
                <div>
                    <input type="hidden" name="dbName" value="" id="databaseTableColumnRemoveInput">
                    <input type="hidden" name="tableName" value="" id="CurrentTableColumnRemoveInput">
                    <input type="hidden" name="columnName" value="" id="columnRemoveInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript">
    function removeColumn(bdd,table,column) {
        console.log(column);
        document.getElementById("columnRemove").innerHTML = column;
        document.getElementById("columnRemoveInput").value = column;
        document.getElementById("CurrentTableColumnRemoveInput").value = table;
        document.getElementById("databaseTableColumnRemoveInput").value = bdd;
    }
</script>
