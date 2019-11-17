<?php


namespace App\Controller;
use App\Model\ActorManager;
use App\Model\CommentManager;
use App\Model\UserManager;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends MainController
{

    /**
     * @var CommentManager|null
     */
    private $commentManager = null;

    /**
     * @var ActorManager|null
     */
    private  $actorManager = null;

    /**
     * @var UserManager|null
     */
    private $userManager = null;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commentManager = new CommentManager();
        $this->actorManager = new ActorManager();
        $this->userManager = new UserManager();
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function listActor()
    {
        $user = $this->userManager->getUser();
        $listActors = $this->actorManager->getActors();
        return $this->render('Frontend/homeView.twig', ['listActors' => $listActors, 'user' => $user ]);

    }


}
