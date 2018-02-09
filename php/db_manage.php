<?php
/**
 * Created by PhpStorm.
 * User: t14xt3r
 * Date: 02/02/2018
 * Time: 23:00
 */

class db_manage
{
    public $conn;

    public function __construct()
    {
        $server = "localhost";
        $user = "root";
        $db_name = "atom_db";

        $this->conn = new mysqli($server, $user, NULL, $db_name);
        $this->conn->set_charset('utf8');

    }

}