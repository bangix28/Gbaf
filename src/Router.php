<?php
namespace App;

use App\Controller;
use App\Controller\UserController;
use App\Controller\ActorController;
use App\Controller\CommentController;
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

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userController = new UserController();
        $this->actorController = new  ActorController();
        $this->commentController = new CommentController();
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
                    var_dump($this->actorController->listActor()) ;
                    include_once 'View/Frontend/homeView.php';

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
                    require  'View/Backend/addActorView.php';
                    break;
                case 'actor' :
                    require 'View/Frontend/actorView.php';
                    break;
                    default:
                        include_once'View/Frontend/userConnectView.php';
            }


        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            require('View/Backend/ErrorView.php');
        }
    }
}
