<?php
namespace App;

use App\Controller;
use App\Controller\UserController;
use App\Controller\ActorController;
use App\Controller\CommentController;
use App\Controller\HomeController;
use App\Controller\UserSettings;
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
     * @var ActorController|null
     */
    private $actorController = null;

    private $commentController = null;

    private  $homeController = null;

    private  $userSettings = null;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userController = new UserController();
        $this->actorController = new  ActorController();
        $this->commentController = new CommentController();
        $this->homeController = new  HomeController();
        $this->userSettings = new  UserSettings();
    }

    /**
     *
     */
    public function run()
    {
        try {
            if (isset($_GET['access']) && !empty($_GET['access'])) {
                $access = $_GET['access'];
            }
            else {
                $access = 'connect';
            }

            switch ($access) {
                case 'home':
                       $response = $this->homeController->listActor() ;
                    break;
                case 'register':
                       $response = $this->userController->register();
                    break;
                case 'addActor' :
                       $response = $this->actorController->addActor();
                    break;
                case 'actor' :
                       $response = $this->actorController->getActor();
                    break;
                case 'connect' :
                       $response = $this->userController->connect();
                       break;
                case 'disconnect':
                    $response = $this->userController->disconnect();
                    break;
                case 'addComment':
                    $response = $this->commentController->addComment();
                    break;
                case 'userSettings':
                    $response = $this->userSettings->userSettings();
                    break;
            }
            echo filter_var($response);


        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            require('View/Backend/ErrorView.twig');
        }
    }
}
