<?php

namespace App\Controller;

use App\Model\UserManager;
use Exception;
use http\Header;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends MainController
{
    /**
     * @var UserManager|null
     */
    private $userManager = null;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userManager = new UserManager();
    }

    /**
     * @throws Exception
     */
    public function connect()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
             $user = $this->userManager->userConnect();
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['id'] = $user['id_user'];
              header('Location:index.php?access=home');
            } else {
                $message = 'Mauvais identifiant';
                return $this->render('Frontend/userConnectView.twig', ['message' => $message]);
            }
        }
        return $this->render('Frontend/userConnectView.twig');
    }

    /**
     * @throws Exception
     */
    public function register()
    {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                $user = $this->userManager->testUsername();
                if ($user == 0) {
                    $this->userManager->userRegister();
                } else {
                    $message = 'ce pseudo existe déja !';
                    return $this->render('Frontend/userRegisterView.twig', ['message' => $message]);
                }
            }
        return $this->render('Frontend/userRegisterView.twig');
        }

        public function disconnect()
        {
            session_destroy();
            header('Location:index.php?access=connect');
        }


}
