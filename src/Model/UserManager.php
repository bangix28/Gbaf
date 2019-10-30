<?php
namespace App\Model;
use Database;

class UserManager extends Database
{
    public function userRegister()
    {
        $db = parent::dbConnect();

    }
    public function userConnect()
    {
        $db = parent::dbConnect();
        $user = $db->prepare('SELECT * FROM user WHERE username = ?');
        $user->execute(array($_POST['username']));
        $user_exist = $user->fetch();
        if ($user_exist == false)
        {
            throw new \Exception('Mauvais identifiant');
        }else
            {
            $pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $pass_exist = password_verify('$_POST['password'],$user['password']');
            if ($pass_exist == false)
            {
                return 'false';
            }else
                {
                throw new \Exception('Mauvais mot de passe');
            }
        }
    }
}