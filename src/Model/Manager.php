<?php


namespace App\Model;


use PDO;

class Manager
{
    public function __construct()
    {

        $bd = new PDO(DB_DSN, DB_PASS, DB_USER, );
        require '../config/db.php';
    }
}
