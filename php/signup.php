<?php

require_once ('db_manage.php');
$Connection = new db_manage();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? hash('sha256',$_POST['password']) : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

if ($username or $password or $nome or $cognome or $email == null):
    header('location /');
else:
    $Connection->conn->query("INSERT INTO user_list (id, username, password, nome, cognome, email, tipo_utente) VALUES (null, '$username', '$password', '$nome', '$cognome', '$email', 2)");
endif;

header('location: /');