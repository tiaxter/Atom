<?php
require_once ('db_manage.php');
$Connection = new db_manage();
$disponibile = TRUE;

if (isset($_POST['username'])){
    $username = $_POST['username'];
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
}
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $search_email = ($Connection->conn->query("SELECT email from user_list WHERE email='$email'"))->fetch_assoc();
    if ($search_email !== null){
        echo ('Usata');
    }else{
        echo ('Nuova');
    }
}