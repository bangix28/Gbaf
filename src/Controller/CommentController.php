<?php


namespace App\Controller;
use App\Model\ActorManager;
use App\Model\CommentManager;
use App\Model\UserManager;


class CommentController extends MainController
{
    private $actorManager = null;

    private  $userManager = null;

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