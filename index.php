<?php
ob_start("ob_gzhandler");
require_once('php/islogged.php');
?>
<html>
<head>
    <?php require('static/head.php'); ?>
</head>

<body>
<?php require('static/navbar.php') ?>
<div class="jumbotron">
    <?php if (isset($_SESSION['r_hash'])): ?>
        <h1>Benvenuto <?= $result_2['nome'] ?></h1>
    <?php else: ?>
        <h1>Benvenuto</h1>
        <h2>Clicca Accedi per eseguire l'accesso o Registrati per registrarti</h2>
    <?php endif; ?>
</div>
<?php if (!isset($_SESSION['r_hash'])): ?>
    <div id="Login-div">
        <div class="div-Login">
            <form class="col-xs-3" id="log-in" onSubmit="return false;">
                <div class="form-group">
                    <label for="username">Nome utente:</label>
                    <input type="text" class="form-control" id="username" placeholder="Inserisci nome utente"
                           name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Inserisci la password"
                           name="password">
                </div>
                <button id="login-btn" class="btn btn-default">Accedi</button>
            </form>
        </div>
    </div>
    <div id="Signup-div">
        <div class="div-Login">
            <form class="col-xs-3" id="sign-up" onSubmit="return false;">
                <div class="form-group">
                    <label for="username">Nome utente:</label>
                    <input type="text" class="form-control" id="username" placeholder="Inserisci nome utente"
                           name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Inserisci la password"
                           name="password">
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Inserisci il nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="cognome">Cognome:</label>
                    <input type="text" class="form-control" id="cognome" placeholder="Inserisci il cognome"
                           name="cognome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" placeholder="Inserisci l'indirizzo mail"
                           name="email">
                </div>
                <button id="signup-btn" class="btn btn-default">Registrati</button>
            </form>
        </div>
    </div>
<?php endif; ?>
</body>

<script type="application/javascript" src="js/index.js"></script>

</html>