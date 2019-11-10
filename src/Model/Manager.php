<?php


namespace App\Model;

use PDO;

class Manager
{
    public function dbConnect()
    {
        $bd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '',);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $bd;
    }
}
