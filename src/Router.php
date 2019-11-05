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
                        Controller\Frontend::userConnect();
                    }
                    elseif ($_GET['access'] == 'home')
                    {
                        require('View/Frontend/homeView.php');
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
