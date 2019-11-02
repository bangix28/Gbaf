<?php


namespace App\Model;


use PDO;

class Manager
{
    public function __construct()
    {
        $db_dsn = DB_DSN;
        $db_user = DB_USER;
        $db_pass = DB_PASS;
        $bd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        return $bd;
    }
}
