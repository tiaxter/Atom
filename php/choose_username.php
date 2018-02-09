<?php
require_once ('db_manage.php');
$Connection = new db_manage();
$username = isset($_POST['username']) ? $_POST['username'] : null;
$disponibile = TRUE;

$search_username = ($Connection->conn->query("SELECT username from user_list WHERE username='$username'"))->fetch_assoc();

if ($username === ''){
    echo ('Spazio Vuoto');
}else{
    if ($search_username == null){
        echo ('Username disponibile');
    }else{
        echo ('Username non disponibile');
    }
}