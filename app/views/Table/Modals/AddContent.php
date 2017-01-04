<div class="modal fade" id="myModalAddBdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?p=bdd.add" method="post" id="formDatabaseAdd">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Création d'une base de donnée</h4>
                </div>
                <div class="modal-body">
                    <p>Insérer le nom de la nouvelle base de donnée :</p>
                    <div class="form-group">
                        <input type="text" style="width:100%;" name="addDbName" id="databaseAddNewInput">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
