<?php
namespace App;

use App\Controller;
use App\Controller\UserController;
use Exception;


/**
 * Class Router
 * Manages Routes to show Views
 * @package App
 */
class Router
{
    /**
     * @var Controller\UserController
     */
    private $userController = null;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userController = new UserController();
    }

    /**
     *
     */
    public function run()
    {
        try {
            switch ($_GET['access']) {
                case 'connect':
                    if (!empty($_POST['username']) && !empty($_POST['password'])) {
                        $this->userController->connect();
                        }
                    break;
                case 'home':
                    require 'View/Frontend/homeView.php';
                    break;
                case 'register':
                    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                        $this->userController->register();
                    }
                        require 'View/Frontend/userRegisterView.php';
                    break;
                    default:
                        require 'View/Frontend/userConnectView.php';
            }


        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            require('View/Backend/ErrorView.php');
        }
    }
}
