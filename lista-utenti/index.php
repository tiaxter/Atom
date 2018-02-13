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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <td>Username</td>
                        <td>Nome</td>
                        <td>Cognome</td>
                        <td>E-mail</td>
                        <td>Azioni</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_user as $user): ?>
                        <tr data-id="<?=$user['id'];?>">
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['nome']; ?></td>
                            <td><?= $user['cognome']; ?></td>
                            <td><a href="mailto:<?= $user['email']; ?>"><?= $user['email']; ?></a></td>
                            <td>
                                <button data-id="<?=$user['id']?>" class="edit-row">Modifica</button>
                                <?php if ($utente_info['id'] != $user['id']):?>
                                <button data-id="<?=$user['id']?>" class="delete-row">Cancella</button>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h2>Nessun utente registrato</h2>
        <?php endif; ?>
    </div>
    <div id="edit-account">
    <?php
        require ('../static/edit-account.php');
    ?>
    </div>
    </body>
    <script src="../js/lista-utenti.js" type="application/javascript"></script>
    </html>
<?php else:
    header('location: /static/unauthorized');
endif;
?>