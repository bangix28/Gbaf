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
            $this->userManager->userConnect();
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
                    throw new Exception('ce pseudo existe déja !');
                }
            }
        return $this->render('Frontend/userRegisterView.twig');
        }

}
