<?php

namespace App\Controller;

use App\Model\UserManager;
use Exception;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController
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
        $this->userManager = new UserManager();
    }

    /**
     * @throws Exception
     */
    public function connect()
    {
        $user = $this->userManager->userConnect();
    }

    /**
     * @throws Exception
     */
    public function register()
    {
        $user_test = $this->userManager->testUsername();

        if ($user_test == 0) {
            $user_register = $this->userManager->userRegister();
        } else {
            throw new Exception('ce pseudo existe déja !');
        }
    }
}
