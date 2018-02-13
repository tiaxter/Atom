<?php
 require_once ('db_manage.php');
 $Connection = new db_manage();

 $id = $_POST['id'];

 $Connection->conn->query("DELETE from user_list WHERE id=$id");
 echo ('Utente Eliminato');