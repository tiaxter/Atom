<?php
ob_start("ob_gzhandler");
require_once('../php/islogged.php');
?>
<?php if (isset($_SESSION['r_hash'])): ?>
    <html>
    <head>
        <?php require('../static/head.php'); ?>
    </head>

    <body>
    <?php require('../static/navbar.php'); ?>
    <div class="jumbotron">
        <h1>Modifica impostazioni</h1>
    </div>
    <div class="jumbotron" id="Login-Form-Div">
        <form class="col-xs-3" method="post" action="../php/changesetting.php">
            <div class="form-group" style="display: none">
                <label for="id">Id:</label>
                <input id="id" name="id_n" type="text" class="form-control" value="<?= $result_2['id'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Nome utente:</label>
                <input id="username" name="username" type="text" class="form-control"
                       value="<?= $result_2['username'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" name="password" type="password" class="form-control"
                       placeholder="Cambia la password">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input id="nome" name="nome" type="text" class="form-control" value="<?= $result_2['nome'] ?>">
            </div>
            <div class="form-group">
                <label for="cognome">Cognome:</label>
                <input id="cognome" name="cognome" type="text" class="form-control" value="<?= $result_2['cognome'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" name="email" type="text" class="form-control" value="<?= $result_2['email'] ?>">
            </div>
            <button type="submit" class="btn btn-default">Cambia impostazioni</button
        </form>
    </div>
    </body>
    </html>
<?php else:
    header('location: /');
endif;
?>
