<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Bases de données</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td colspan="3"  class="text-center"><span class="glyphicon glyphicon-plus"></td>
                        </tr>
                        <?php
                        foreach($databases as $data)
                        {
                            echo '<tr>';
                            echo '<td>' . $data . '</td>';
                            echo '<td class="text-center"><span class="glyphicon glyphicon-pencil rename"></span></td>';
                            echo '<td class="text-center"><span class="glyphicon glyphicon-trash remove"></span></td>';
                            echo '<tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require 'sql.php'; ?>
    </div>

</div>