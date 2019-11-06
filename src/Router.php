<?php
namespace App;

use App\Controller;
use Exception;


/**
 * Class Router
 * Manages Routes to show Views
 * @package App
 */
class Router
{
    public function run()
    {
        try
        {
                if(isset($_GET['access']))
                {
                    if ($_GET['access'] == 'connect' )
                    {
                        if(!empty($_POST['username']) AND !empty($_POST['password']))
                        {
                            Controller\Frontend::connect();
                        }
                    }
                    elseif ($_GET['access'] == 'home')
                    {
                        require('View/Frontend/homeView.php');
                    }
                    elseif ($_GET['access'] == 'registerView')
                    {
                        require ('View/Frontend/userRegisterView.php');
                    }
                    elseif ($_GET['access'] == 'register')
                    {
                        if (!empty($_POST['username']) AND !empty($_POST['user_name']) AND  !empty($_POST['lastname']) AND !empty($_POST['password']) AND !empty($_POST['question']) AND !empty($_POST['answer']))
                        {
                         Controller\Frontend::register();
                        }else{
                            throw new Exception('vous n\'avez pas remplis tout le champs');
                        }
                    }
                }else{
                    require ('View/Frontend/userConnectView.php');
                }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            require('View/Backend/ErrorView.php');
        }
    }
}
