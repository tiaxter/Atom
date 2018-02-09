<?php

require_once ('db_manage.php');
$Connection = new db_manage();

$id = $_POST['id_n'];
$username = $_POST['username'];
$password = $_POST['password'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];

if ($password != null):
    $password_n = hash('sha256', $password);
else:
    $password = ($Connection->conn->query("SELECT password from user_list WHERE id=$id"))->fetch_assoc();
    $password_n = $password['password'];
endif;
$Connection->conn->query("UPDATE user_list SET username='$username', password='$password_n', nome='$nome', cognome='$cognome', email='$email' WHERE id=$id");
header("location: ../");