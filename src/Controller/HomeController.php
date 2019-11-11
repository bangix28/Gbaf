<?php


namespace App\Controller;
use App\Model\ActorManager;
use App\Model\CommentManager;

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
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commentManager = new CommentManager();
        $this->actorManager = new ActorManager();
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function listActor()
    {
        $listActors = $this->actorManager->getActors();

        echo $this->render('Frontend/homeView.twig', ['listActors' => $listActors, 'session' => $_SESSION['id']]);

    }


}
