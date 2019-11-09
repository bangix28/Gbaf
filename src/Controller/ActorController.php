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
        $listActors = $this->actorManager->getActors();
        return $listActors;


    }

    /**
     *
     */
    public function addActor()
    {
        $actorName = $this->actorManager->actorNameVerification();
        if ($actorName == 0 ) {
            $this->actorManager->imageVerification();
            if ($upload = true) {
                $this->actorManager->addActor();
            }
        }else {
            throw new \Exception('Ce nom existe déja !');
        }
    }
}