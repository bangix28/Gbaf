<?php


namespace App\Controller;
use App\Model\ActorManager;
use App\Model\CommentManager;
use App\Model\UserManager;


/**
 * Class CommentController
 * @package App\Controller
 */
class CommentController extends MainController
{
    /**
     * @var ActorManager|null
     */
    private $actorManager = null;

    /**
     * @var UserManager|null
     */
    private  $userManager = null;

    /**
     * @var CommentManager|null
     */
    private $commentManager = null;
    /**
     * ActorController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->actorManager = new ActorManager();
        $this->userManager = new UserManager();
        $this->commentManager = new CommentManager();
    }

    /**
     * @return string
     */
    public function addComment()
    {
        $user = $this->userManager->getUser();
        $post = $this->actorManager->getActor();
        if (!empty($_POST['comment']))
        {
            $author = $user['username'];
            $this->commentManager->addComment($author);
            header('Location:index.php?access=home');
        }
        return $this->render('Frontend/addCommentView.twig', ['post' => $post, 'user' => $user]);

    }



}