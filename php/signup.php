<?php

require_once ('db_manage.php');
$Connection = new db_manage();

$username = $_POST['username'];
$password = hash('sha256',$_POST['password']);
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];

$Connection->conn->query("INSERT INTO user_list (id, username, password, nome, cognome, email, tipo_utente) VALUES (null, '$username', '$password', '$nome', '$cognome', '$email', 2)");

header('location: /');