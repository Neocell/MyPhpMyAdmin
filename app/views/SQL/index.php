<div class="container">
    <div class="row">
        <form action="index.php?p=sql" method="post" id="formSql">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="width:90%">Exécuter une ou des requêtes SQL</h3>
                    <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <select name="dbSelected" class="form-control">
                            <?php
                            foreach($databases as $data) {
                                echo '<option value="'.$data->Database.'">' . $data->Database . '</option>';
                            }
                            echo '<option value="all">AllDB</option>';
                            ?>
                        </select>
                    </div>
                    <textarea class="form-control" style="width: 100%; height: 200px; max-width: 100%; min-width: 100%;" name="request"></textarea>
                    <button type="submit" class="btn btn-default pull-right">Executer</button>
                </div>
            </div>
        </form>
    </div>
    <?php if(isset($result)) { ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="width:90%">Resultat</h3>
                <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <?php  foreach($result as $datas) { ?>
                        <thead>
                            <tr><?php foreach($datas as $data => $value1) {
                                    echo "<td><strong>$data</strong></td>";
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach($datas as $data2 => $value) {
                                    echo "<td>$value</td>";
                                } ?>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
