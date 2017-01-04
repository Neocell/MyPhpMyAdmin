<div class="modal fade" id="myModalRemoveTable">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?p=table.delete" method="post" id="formTableRemove">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Suppression d'une table</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer la table <strong id="tableRemove">{name}</strong></p>
                </div>
                <div>
                    <input type="hidden" name="tableName" value="" id="tableRemoveInput">
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
    function removeTable(table) {
        console.log(table);
        document.getElementById("tableRemove").innerHTML = table;
        document.getElementById("tableRemoveInput").value = table;
    }
</script>
