<?php

namespace App\Controller;
use App\Model\ActorManager;

/**
 * Class ActorController
 * @package App\Controller
 */
class ActorController
{
    /**
     * @var ActorManager|null
     */
    private $actorManager = null;

    /**
     * ActorController constructor.
     */
    public function __construct()
    {
        $this->actorManager = new ActorManager();
    }

    /**
     *
     */
    public function listActor()
    {
       $this->actorManager->getActors();
    }

    /**
     *
     */
    public function addCreator()
    {
        $this->actorManager->addCreator();
    }
}