<div class="modal fade" id="myModalAddColumn">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="formColumnAdd">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Création d'une colonne</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Nom</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" name="addColumnName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Type</label>
                        <div class="col-xs-10">
                            <select name="addColumnType" class="form-control">
                                <option title="Un nombre entier de 4 octets. La fourchette des entiers relatifs est de -2 147 483 648 à 2 147 483 647. Pour les entiers positifs, c'est de 0 à 4 294 967 295">INT</option>
                                <option title="Une chaîne de longueur variable (0-65,535), la longueur effective réelle dépend de la taille maximum d'une ligne">VARCHAR</option>
                                <option title="Une colonne TEXT d'une longueur maximum de 65 535 (2^16 - 1) caractères, stockée avec un préfixe de deux octets indiquant la longueur de la valeur en octets 	">TEXT</option>
                                <option title="Une date, la fourchette est de «1000-01-01» à «9999-12-31»">DATE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Taille</label>
                        <div class="col-xs-10">
                            <input type="number" class="form-control" name="addColumnSize" id="ColumnAddNewInput">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Valeur par défaut</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="addColumnDefaultValue">
                                <option>Aucune</option>
                                <option>Null</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Index</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="addColumnIndex">
                                <option></option>
                                <option>PRIMARY</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Null</label>
                        <div class="col-xs-10">
                            <input class="form-check" type="checkbox" name="addColumnNull" value="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Auto increment</label>
                        <div class="col-xs-10">
                            <input class="form-check" type="checkbox" name="addColumnAI" value="true">
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="dbName" value="" id="databaseTableColumnAddInput">
                    <input type="hidden" name="tableName" value="" id="CurrentTableColumnAddInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function addStructure(bdd,table) {
        document.getElementById("CurrentTableColumnAddInput").value = table;
        document.getElementById("databaseTableColumnAddInput").value = bdd;
    }
</script>
