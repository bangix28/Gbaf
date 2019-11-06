<?php


namespace App\Model;

use PDO;

class Manager
{
    public function dbConnect()
    {
        $bd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        return $bd;
    }
}
