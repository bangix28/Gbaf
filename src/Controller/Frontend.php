<?php
namespace App\Controller;
use App\Model\UserManager;
use Exception;

class Frontend
{
        static function userConnect()
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
}