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
        $user_exist = $user->fetch();
        if ($user_exist == false)
        {
            throw new \Exception('Mauvais identifiant');
        }else
            {
            $pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $result = password_verify($pass_hach, $user['password']);
            if ($result == false)
            {
                session_start();
                $_SESSION['id'] = $user['id'];
                header("location:../index.php?access=homeView");
            }else
                {
                throw new \Exception('Mauvais mot de passe');
            }
        }
    }
}