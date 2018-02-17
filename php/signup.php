<?php

require_once('db_manage.php');
$Connection = new db_manage();

$username = isset($_POST['username']) ? $_POST['username'] : null;
$tr_password = isset($_POST['password']) ? $_POST['password'] : null;
$password = isset($_POST['password']) ? hash('sha256', $_POST['password']) : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$activation_code = hash('sha256',rand());
/*Invio mail*/

$header = "From: atom.notreply@gmail.com <atom.notreply@gmail.com>\r\n".
    "MIME-Version: 1.0\r\n" .
    "Content-type: text/html; charset=UTF-8\r\n";
$email_body = file_get_contents("../static/email.php");

$email_body = str_replace("username",$username,$email_body);
$email_body = str_replace("pswd",$tr_password,$email_body);
$email_body = str_replace('verifica','http://www.atom.local/account-confirm/?username='.$username.'&activation_code='.$activation_code, $email_body);

$mail = mail($email,'Benvenuto',$email_body,$header);


$Connection->conn->query("INSERT INTO user_list (id, username, password, nome, cognome, email, tipo_utente, active, activation_code) VALUES (null, '$username', '$password', '$nome', '$cognome', '$email', 2, 0, '$activation_code')");
echo("Registrazione Effettuata");

