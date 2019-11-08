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
        $this->userManager->userConnect();
    }

    /**
     * @throws Exception
     */
    public function register()
    {
        $user = $this->userManager->testUsername();
        if ($user == 0) {
            $this->userManager->userRegister();
        } else {
            throw new Exception('ce pseudo existe déja !');
        }
    }
}
