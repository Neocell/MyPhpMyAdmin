<div class="modal fade" id="myModalEditColumn">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php?p=structure.modif" method="post" id="formStructureEdit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edition d'une colonne dans la table</h4>
                </div>
                <div class="modal-body" id="formStructureEditForm">
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Nom</label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" name="EditColumnName">
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
                            <input type="number" class="form-control" name="addColumnSize" id="ColumnEditNewInput">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Valeur par défaut</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="EditColumnDefaultValue">
                                <option>Aucune</option>
                                <option>Null</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Index</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="EditColumnIndex">
                                <option value="nothing"></option>
                                <option>PRIMARY</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-2 col-form-label">Auto increment</label>
                        <div class="col-xs-10">
                            <input class="form-check" type="checkbox" name="EditColumnAI" value="true">
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="dbName" value="<?= $bdd ?>">
                    <input type="hidden" name="columnName" id="idCurrentName">
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

    function editColumn(vare) {




        var lidcurrent = $($(vare).parent().parent().find(".unevaleur")).text();

        var larow = $(vare).parent().parent().find(".unevaleur");

        var test = new Array;
        larow.each(function() {
            test.push($(this).text());
        });

        var tailleType = test[1].split("(");
        var type = tailleType[0];
        var taille = parseInt(tailleType[1].split(")")[0]);
        test.splice(1, 1, type, taille);


        var $inputcheck = $('#formStructureEdit :input.form-check');
        var $inputs = $('#formStructureEdit :input.form-control');
        $("#idCurrentName").val(test[0]);
        $($inputs[0]).val(test[0]);
        $($inputs[1]).val(test[1].toUpperCase());
        $($inputs[2]).val(test[2]);
        if(test[3] == "YES")
            $($inputs[3]).val("Null");
        else
            $($inputs[3]).val("Aucune");

        if(test[4] == "Primary")
            $($inputs[4]).val("PRIMARY");
        else
            $($inputs[4]).val("");
        if (test[6] == "auto_increment")

            $inputcheck.prop( "checked", true );
        else
            $inputcheck.prop( "checked", false );

    }

</script>
