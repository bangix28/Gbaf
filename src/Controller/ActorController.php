<?php

namespace App\Controller;
use App\Model\ActorManager;

/**
 * Class ActorController
 * @package App\Controller
 */
class ActorController extends MainController
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
        parent::__construct();
        $this->actorManager = new ActorManager();
    }

    /**
     *
     */
    public function addActor()
    {
        if (!empty($_POST['name']) && !empty($_FILES['logo']) &&!empty($_POST['link']) && !empty($_POST['description']))
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
        return $this->render('Backend/addActorView.twig');

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

    public function getActor()
    {
         return $this->render('Frontend/actorView.twig');
    }

}