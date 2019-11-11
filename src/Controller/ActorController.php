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

    public function getComments()
    {
        $getcomment = $this->actorManager->getComments();
        return $getcomment;
    }
     public function getLike()
    {
        $this->commentManager->getLike();
    }

    public function addLike()
    {
        $req = $this->commentManager->getLike();
        $like = $req->fetch();
        $addlike = $like['actor_like'];
        $addlike++;
        $this->commentManager->addLike($addlike);
    }

}