<?php

namespace App\Controller;

use App\Model\UserManager;
use Exception;

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
                $message = 'Mauvais identifiant ';
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
                header('Location:index.php?access=connect');
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

    public function recoverPassword()
    {
       $user = $this->userManager->testUsername();
       if ($user == true)
       {
           $answer = $this->userManager->recoverPassword();
           $test = $_POST['answer'] === $answer['answer'];
           if ($test === true) {
               $userId = $user['id_user'];
               $this->userManager->changePassword($userId);
           }
           return $this->render('Backend/answerView.twig', ['user' => $user ]);
       }
       return $this->render('Backend/recoverPasswordView.twig');
    }

    public function userSettings()
    {
        $user = $this->userManager->getUser();
        if (isset($_SESSION['id'], $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer']))
        {
            $this->userManager->editUser();

            if (isset($_POST['password'])) {
                $userId = $_SESSION['id'];
                $this->userManager->changePassword($userId);
            }
            header('location:index.php?access=home');
        }
        return $this->render('Backend/userSettingsView.twig', ['user' => $user]);
    }
}
