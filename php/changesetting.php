<?php

require_once('db_manage.php');
$Connection = new db_manage();

$id = $_POST['id_n'];
$username = $_POST['username'];
if (empty($_POST['password'])):
    $password = ($Connection->conn->query("SELECT password from user_list WHERE id=$id")->fetch_assoc())['password'];
else:
    $password = hash('sha256', $_POST['password']);
endif;
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$ruolo = isset($_POST['ruolo']) ? $_POST['ruolo'] : ($Connection->conn->query("SELECT tipo_utente from user_list WHERE id=$id")->fetch_assoc())['tipo_utente'];
$Connection->conn->query("UPDATE user_list SET username='$username', password='$password', nome='$nome', cognome='$cognome', email='$email', tipo_utente=$ruolo WHERE id=$id");