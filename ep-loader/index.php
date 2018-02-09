<?php
require_once('../php/islogged.php');
if (isset($_SESSION['r_hash']) and $utente_info['tipo'] == "admin"):?>
<html>

<head>
    <?php require ('../static/head.php');?>
</head>

<body>
    <?php require ('../static/navbar.php');?>
    <div class="jumbotron">
        <h1>WIKIPEDIA Episode Info Dump</h1>
    </div>
    <div class="jumbotron" id="Login-Form-Div">
        <form class="col-xs-3" method="post" action="parsing.php">
            <div class="form-group">
                <label for="url">Url:</label>
                <input name="url" type="text" placeholder="Inserisci l'url di Wikipedia" class="form-control" id="url">
            </div>
            <div class="form-group">
                <label for="shortname">Abbreviativo:</label>
                <input name="shortname" type="text" placeholder="Inserisci l'abbreviativo dell'Anime" class="form-control" id="shortname">
            </div>
            <button type="submit" class="btn btn-default" name="invio">Invio</button>
        </form>
    </div>
</body>

</html>
<?php else:
    header('location: ../static/unauthorized');
    endif;