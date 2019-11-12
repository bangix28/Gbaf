<?php


namespace App\Controller;


namespace App\Controller;

use App\Model\ActorManager;
use App\Model\UserManager;
use App\Model\CommentManager;

/**
 * Class ActorController
 * @package App\Controller
 */
class UserSettings extends MainController
{
    /**
     * @var ActorManager|null
     */
    private $actorManager = null;

    private $userManager = null;

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

    public function userSettings()
    {
            $user = $this->userManager->getUser();
            if (isset($_POST['password'], $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer'])) {
                $this->actorManager->imageVerification();
                $this->userManager->editUser();
            }
           return $this->render('Backend/userSettingsView.twig', ['user' => $user]);
    }
}