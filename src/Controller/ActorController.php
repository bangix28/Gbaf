<?php

namespace App\Controller;
use App\Model\ActorManager;

class ActorController
{
    private $actorManager = null;

    public function __construct()
    {
        $this->actorManager = new ActorManager();
    }
}