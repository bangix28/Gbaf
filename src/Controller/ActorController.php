<?php

namespace App\Controller;
use App\Model\ActorManager;
use App\Model\UserManager;
use App\Model\CommentManager;

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
        $this->userManager = new UserManager();
        $this->commentManager = new CommentManager();
    }

    /**
     *
     */
    public function addActor()
    {
        $user = $this->userManager->getUser();
        if (!empty($_POST['name']) && !empty($_FILES['logo']) &&!empty($_POST['link']) && !empty($_POST['description'] && !empty($_POST['tiny_desc'])))
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
        return $this->render('Backend/addActorView.twig', ['user' => $user]);

    }

    /**
     * @return string
     */
    public function getActor()
    {


        $user = $this->userManager->getUser();
        $actor = $this->actorManager->getActor();
        $actor_id = $_GET['id'];
        $comment = $this->commentManager->getComments($actor_id);
        $nbrComment = $comment->rowCount();

         return $this->render('Frontend/actorView.twig', [
             'user' => $user,
             'actor' => $actor,
             'comment' => $comment,
             'nbrComment' => $nbrComment]);
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        $getcomment = $this->actorManager->getComments();
        return $getcomment;
    }

    /**
     *
     */
    public function voteVerification()
    {
      $vote = $this->userManager->voteVerification();
      if ($vote == false) {
          $this->actorManager->addVote();
          var_dump($like = $this->actorManager->getLike());
          $vote = $_GET['vote'];
          switch ($vote)
          {
              case '1':
                $this->actorManager->addLike($like);
              break;
              case '-1':
                  $this->actorManager->addDislike($like);

          }
          header('Location:index.php?access=actor&id=' . $_GET['id']);
      } else {
          header('Location:index.php?access=actor&id=' . $_GET['id']);
      }


    }

    /**
     *
     */
    public function addLike()
    {
        $req = $this->commentManager->getLike();
        $like = $req->fetch();
        $addlike = $like['actor_like'];
        $addlike++;
        $this->commentManager->addLike($addlike);
    }



}