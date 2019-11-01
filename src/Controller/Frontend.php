<?php
namespace App\Controller;
use App\Model\UserManager;

public function userConnect()
{
    $userManager = new UserManager();
    $user_connect = $userManager->userConnect();
}