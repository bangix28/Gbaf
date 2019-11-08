<?php


namespace App\Model;
use App\Model\Manager;

class ActorManager
{
    private $manager = null;

    public function __construct()
    {
        $this->manager = new Manager();
    }
}