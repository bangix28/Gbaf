<?php

class Database
{
    protected function dbConnect()
    {
        $bd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root','');
        return $bd;
    }
}