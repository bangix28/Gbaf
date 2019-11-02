<?php
namespace App\Controller;
use App\Model\UserManager;
class Frontend
{
   static function userConnect()
    {
        $userManager = new userManager();
        $user = $userManager->userConnect();
    }
}