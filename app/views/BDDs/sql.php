<div class="container">
    <div class="row">
        <form action="index.php?p=sql" method="post" id="formSql">
            <div class="panel panel-default">
                <div class="form-group">
                    <?php
                    foreach($databases as $data) {
                        echo '<label>' .
                                '<input type="radio" name="dbSelected" value="'.$data->Database.'">' .
                                ' -> ' . $data->Database .
                            '</label><br>';
                    }
                    echo '<label>' .
                                '<input type="radio" name="dbSelected" value="all">' .
                                ' -> AllDB' .
                            '</label><br>';
                    ?>
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title" style="width:90%">Exécuter une ou des requêtes SQL</h3>
                    <span class="pull-right clickable" style="margin-top: -20px"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                        <textarea style="width: 100%; height: 200px; max-width: 100%; min-width: 100%;" name="request"></textarea>
                        <button type="submit" class="btn btn-default pull-right">Executer</button>
                </div>
            </div>
            <div class="result">
                <?php
                    if(isset($result)) {
                        var_dump($result);
                        foreach($result as $datas) {
                            foreach($datas as $data => $value) {
                                ?>
                                    <p><?php $value ?></p>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </form>
    </div>
</div>
