<?php
namespace App;

use App\Controller\Frontend;


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
                     Frontend::userConnect();
                    }
                    elseif ($_GET['access'] == 'home')
                    {
                        require('View/Frontend/homeView.php');
                    }
                }else{
                    Frontend::userConnect();
                }
        }
        catch (Exception $e)
        {
            throw new Exception('Erreur:' . $e->getMessage());
            require('View/Backend/errorView.php');
        }
    }
}
