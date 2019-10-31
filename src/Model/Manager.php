<?php


namespace App\Model;


class Manager
{
    protected function __construct()
    {
        $bd = new PDO(DB_DSN, DB_USER, DB_PASS);
        return $bd;
    }
