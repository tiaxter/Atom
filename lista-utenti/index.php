<?php
ob_start("ob_gzhandler");
require_once('../php/islogged.php');
?>
<?php if (isset($_SESSION['r_hash']) and $usertype == "admin"): ?>
        <html>
        <head>
            <?php require('../static/head.php'); ?>
        </head>

        <body>
        <?php require('../static/navbar.php'); ?>
        <div class="jumbotron">
            <h1>Lista utenti:</h1>
        </div>
        <div id="all-user" class="jumbotron">
            <?php $all_user = ($Connection->conn->query("SELECT * FROM user_list"))->fetch_all(MYSQLI_ASSOC);
            if (count($all_user) > 0): ?>
            <table>
                <thead>
                <tr>
                    <td>Username</td>
                    <td>Nome</td>
                    <td>Cognome</td>
                    <td>E-mail</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($all_user as $user): ?>
                    <tr>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['nome']; ?></td>
                        <td><?= $user['cognome']; ?></td>
                        <td><a href="mailto:<?= $user['email']; ?>"><?= $user['email']; ?></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <?php else: ?>
                    <h2>Nessun utente registrato</h2>
                <?php endif; ?>
        </div>
        </body>
        </html>
<?php else:
    header('location: /static/unauthorized');
endif;
?>