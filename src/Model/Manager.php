<?php


namespace App\Model;

use PDO;

/**
 * Class Manager
 * @package App\Model
 */
class Manager
{
    /**
     * @return PDO
     */
    public function dbConnect()
    {
        require_once '../config/db.php';
        $bd = new PDO(DB_DSN, DB_USER, DB_PASS);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $bd;
    }
}
