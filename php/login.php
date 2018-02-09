<?php

require_once ('db_manage.php');

$Connection = new db_manage();

$username = $_POST['username'];
$password = hash('sha256',$_POST['password']);

$result = ($Connection->conn->query("SELECT * FROM user_list WHERE username='$username'"))->fetch_assoc();

if ($result['password'] == $password):

    $random_hash = hash('sha256', rand());

    session_start();

    $_SESSION['r_hash'] = $random_hash;

    $Connection->conn->query("UPDATE active_session SET id=$result[id], random_hash='$random_hash'");

    /*header("location: ../");*/
else:
    echo('Login NON Eseguito');
endif;