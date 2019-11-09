<?php


namespace App\Model;
use App\Model\Manager;


class CommentManager
{
    private $manager = null;

    public function __construct()
    {
        $this->manager = new Manager();
    }
}