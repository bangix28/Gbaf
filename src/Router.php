<?php
namespace App;

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
                if($_GET['access'] == 'home')
                {
                    require('View/Frontend/homeView.PHP');
                }
        }
        catch (Exception $e)
        {
            throw new Exception('Erreur:' . $e->getMessage());
        }
    }
}
