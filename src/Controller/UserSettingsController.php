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
class UserSettingsController extends MainController
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
            if (isset($_SESSION['id'], $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer']))
            {
                $this->userManager->editUser();

                if (isset($_POST['password'])) {
                    $this->userManager->changePassword();
                }
                header('location:index.php?access=home');
            }
           return $this->render('Backend/userSettingsView.twig', ['user' => $user]);
    }

}