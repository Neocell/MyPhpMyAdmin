<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">myPhpMyAdmin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                
                if ($p === 'accueil') {
                     echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo '<a href="index.php?p=accueil">Accueil</a></li>';
                
                if ($p === 'bdd') {
                     echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo '<a href="index.php?p=bdd">Base de données</a></li>';
                
                
                if ($p === 'sql') {
                     echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo '<a href="index.php?p=sql">SQL</a></li>';
                
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>