<?php
namespace App\Controller;
use App\Model\UserManager;
use Exception;

class Frontend
{
         static function connect()
    {
        $userManager = new userManager();
        $user = $userManager->userConnect();
        if ($pass_exist == true)
        {
            $_SESSION['id'] = $user['id'];
            header('Location:index.php?action=home');
        }else{
            throw new Exception('Mauvais identifiant');
        }
    }
    static function register()
    {
        $userManager = new userManager();
        $user_test = $userManager->testUsername();
        if($user_test == 0)
        {
         $user_register = $userManager->userRegister();
        }else
        {
            throw new Exception('ce pseudo existe déja !');
        }

    }
}