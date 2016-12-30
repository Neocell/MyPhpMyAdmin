<div class="modal fade" id="myModalRemove">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="formDatabaseRemove">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Suppression d'une Base de donnée</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer la base de donnée <strong id="databaseRemove">{name}</strong></p>
                </div>
                <div>
                    <input type="hidden" name="dbName" value="" id="databaseRemoveInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" >Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#formDatabaseRemove" ).submit(function( event ) {
        event.preventDefault();

        var theDbName = document.getElementById("databaseRemoveInput").value;

        $.ajax({
            method: "POST",
            url: "index.php?p=bdd.delete",
            data: { dbName: theDbName }
        }).done(function(data) {
            // $('#myModalRemove').modal('hide');
            // location.reload();
            console.log(data);
        });

    });
</script>


<script type="text/javascript">
    function removeBDD(database) {
        console.log(database);
        document.getElementById("databaseRemove").innerHTML = database;
        document.getElementById("databaseRemoveInput").value = database;
    }
</script>
