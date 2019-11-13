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

            if (isset($_POST['username']) && !empty($_POST['username'])) {
                $username = $this->userManager->recoverPassword();
                if ($username == true) {
                    if (isset($_POST['answer']) && !empty($_POST['answer'])) {
                        $answerTest = $username['answer'] = $_POST['answer'];
                        if ($answerTest == true) {
                            if (isset($_POST['password']) && $_POST['password']) {
                                $this->userManager->changePassword();
                            } else {
                                $message = 'mettre un mot de passe !';
                                return $this->render('Backend/changePasswordView.twig', ['username' => $username,'message' => $message]);
                            }
                            return $this->render('Backend/changePasswordView.twig', ['username' => $username]);
                        } else {
                            $message = 'Mauvaise Reponse';
                            return $this->render('Backend/answerView.twig', ['username' => $username, 'message' => $message] );
                        }
                    }
                    return $this->render('Backend/answerView.twig', ['username' => $username]);
                } else {
                    $message = 'Mauvaise pseudo';
                    return $this->render('Backend/recoverPasswordView.twig', ['username' => $username, 'message' => $message]);
                }
            }
            return $this->render('Backend/recoverPasswordView.twig');
        }
}
