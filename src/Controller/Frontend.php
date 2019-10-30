<?php
namespace App\Controller;
use App\Model\UserManager;

public function userConnect()
{
    $userManager = new UserManager();
    $user_connect = $userManager->userConnect();
    if ($resultat == false)
    {
        throw new \Exception('Mauvais mot de passe');
    }
    else
    {
        header('location:index.php?access=home');
    }
}