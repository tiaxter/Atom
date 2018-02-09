<?php

require_once ('db_manage.php');
$Connection = new db_manage();

session_start();
session_destroy();

$Connection->conn->query("UPDATE active_session id=1, random_hash='null'");

header("location: ../");