<div class="modal fade" id="myModalRenameTable">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?table.rename" method="post" id="formTableRename">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Renommage d'une table</h4>
                </div>
                <div class="modal-body">
                    <p>Insérer le nouveau nom de la table <strong id="tableRename">{name}</strong> :</p>
                    <div class="form-group">
                        <input type="text" style="width:100%;" name="newTableName" id="tableRenameNewInput">
                    </div>
                </div>
                <div>
                    <input type="hidden" name="currentTableName" value="" id="CurrentTableRenameInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Renommer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function renameTable(table) {
        console.log(table);
        document.getElementById("tableRename").innerHTML = table;
        document.getElementById("CurrentTableRenameInput").value = table;
    }
</script>
