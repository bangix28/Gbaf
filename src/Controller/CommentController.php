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
        if (!empty($_POST['comment']))
        {
            $this->commentManager->addComment($user);
            header('Location:index.php?access=actor&id='. $actorId);
        }
        return $this->render('Frontend/addCommentView', ['user' => $user]);

    }


}