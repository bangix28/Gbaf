<?php
namespace App;

use function App\Controller\userConnect;

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
                    if ($_GET ('access') == 'userConnect' )
                    {
                        userConnect();
                    }
                    elseif ($_GET['access'] == 'home')
                    {
                        require('View/Frontend/homeView.php');
                    }
                }else{
                require ('View/Frontend/userConnectView.php');
        }
        }
        catch (Exception $e)
        {
            throw new Exception('Erreur:' . $e->getMessage());
        }
    }
}
