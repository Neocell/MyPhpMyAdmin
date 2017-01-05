<div class="modal fade" id="myModalRemoveContent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?p=content.delete" method="post" id="formContentRemove">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Suppression d'une ligne</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer la ligne avec la clé primaire <strong id="contentRemove">{name}</strong></p>
                </div>
                <div>
                    <input type="hidden" name="dbName" value="" id="databaseTableColumnRemoveInput">
                    <input type="hidden" name="tableName" value="" id="CurrentTableColumnRemoveInput">
                    <input type="hidden" name="contentName" value="" id="contentRemoveInput">
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
    function removeContent(database,table,content) {
        document.getElementById("contentRemove").innerHTML = content;
        document.getElementById("contentRemoveInput").value = content;
        document.getElementById("databaseTableColumnRemoveInput").value = database;
        document.getElementById("CurrentTableColumnRemoveInput").value = table;
    }
</script>
