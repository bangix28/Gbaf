<?php
namespace App\Model;
use App\Model\Manager;

class UserManager extends Manager
{
    public function userRegister()
    {
        $db = parent::__construct();

    }
    public function userConnect()
    {
        $db = parent::__construct();
        $user = $db->prepare('SELECT * FROM user WHERE username = ?');
        $user->execute(array($_POST['username']));
        return $user;
    }
}