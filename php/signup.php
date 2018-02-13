<?php

require_once('db_manage.php');
$Connection = new db_manage();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$tr_password = isset($_POST['password']) ? $_POST['password'] : null;
$password = isset($_POST['password']) ? hash('sha256', $_POST['password']) : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

$msg = "Benvenuto su Atom ".$nome."\nTi sei registrato con i seguenti dati\nUsername: ".$username.", Password: ".$tr_password;

$mail = mail($email, 'Registrazione ad Atom', $msg, 'atom.notreply@gmail.com');

$Connection->conn->query("INSERT INTO user_list (id, username, password, nome, cognome, email, tipo_utente) VALUES (null, '$username', '$password', '$nome', '$cognome', '$email', 2)");
echo("Registrazione Effettuata");
