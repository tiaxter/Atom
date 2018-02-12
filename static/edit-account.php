<?php
    require_once ('../php/db_manage.php');
    $Connection = new db_manage();
    require_once ('../php/islogged.php');
    if (isset($_SESSION['r_hash'])):
        if (isset($_POST['id'])):
            $id = $_POST['id'];
            $utente = $Connection->conn->query("SELECT * FROM user_list WHERE id=$id")->fetch_assoc();
?>
<form id="loginForm" style="width: 50%; margin: auto; text-align: center;">
    <div class="form-group" style="display: none;">
        <label for="ID">ID</label>
        <input type="text" value="<?=$utente['id']?>" class="form-control" id="ID" name="ID" disabled>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?=$utente['username']?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Se vuoi modificare la password">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?=$utente['nome']?>">
    </div>
    <div class="form-group">
        <label for="cognome">Cognome</label>
        <input type="text" class="form-control" id="cognome" name="cognome" value="<?=$utente['cognome']?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$utente['email']?>">
    </div>
    <div class="form-group">
        <label for="sel1">Tipo utente:</label>
        <select class="form-control" id="sel1" name="ruolo">
            <?php if ($utente['tipo_utente'] == 1):?>
            <option value="1" selected>Amministratore</option>
            <option value="2">Utente</option>
            <?php else:?>
            <option value="1">Amministratore</option>
            <option value="2" selected>Utente</option>
            <?php endif;?>
        </select>
    </div>
    <button id="edit-btn" type="button">Modifica</button>
</form>
<?php
        endif;
        else:
        header('location unauthorized');
endif;