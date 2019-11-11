<?php
namespace App;

use App\Controller;
use App\Controller\UserController;
use App\Controller\ActorController;
use App\Controller\CommentController;
use App\Controller\HomeController;
use Exception;
use function Composer\Autoload\includeFile;


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
     * @var ActorController|null
     */
    private $actorController = null;

    private $commentController = null;

    private  $homeController = null;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userController = new UserController();
        $this->actorController = new  ActorController();
        $this->commentController = new CommentController();
        $this->homeController = new  HomeController();
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
                        $this->homeController->listActor() ;
                    break;
                case 'register':
                    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                        $this->userController->register();
                    }
                    break;
                case 'addActor' :
                    if (!empty($_POST['name']) && !empty($_FILES['logo']) &&!empty($_POST['link']) && !empty($_POST['description']))
                    {
                        $this->actorController->addActor();
                    }
                    require 'View/Backend/addActorView.twig';
                    break;
                case 'actor' :
                    require 'View/Frontend/actorView.twig';
                    break;
                    default:
                        include_once 'View/Frontend/userConnectView.twig';
            }


        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            require('View/Backend/ErrorView.twig');
        }
    }
}
