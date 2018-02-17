<?php
session_start();

require_once ('db_manage.php');
$Connection = new db_manage();

if (isset($_SESSION['r_hash'])):
    $utente_info = [];
    $random_hash = $_SESSION['r_hash'];
    $result_2 = ($Connection->conn->query("SELECT * FROM user_list ul LEFT JOIN active_session a_s on ul.id = a_s.id WHERE random_hash='$random_hash'"))->fetch_assoc();
    $usertype_q = ($Connection->conn->query("SELECT user_type from user_list ul LEFT JOIN user_type ut on ul.tipo_utente = ut.id WHERE ul.id = $result_2[id]"))->fetch_assoc();
    $usertype = $usertype_q['user_type'];
    $utente_info['id'] = $result_2['id'];
    $utente_info['username'] = $result_2['username'];
    $utente_info['nome'] = $result_2['nome'];
    $utente_info['cognome'] = $result_2['cognome'];
    $utente_info['email']  = $result_2['email'];
    $utente_info['tipo'] = $usertype;
    $utente_info['active'] = $result_2['active'];
    else:
    /*Boh*/
endif;