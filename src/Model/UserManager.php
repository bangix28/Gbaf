<?php
namespace App\Model;
use App\Model\Manager;
use Exception;

class UserManager extends Manager
{
    public function userRegister()
    {
        $db = $this->dbConnect();

    }
    public function userConnect()
    {
        $db = $this->dbConnect();
        $resultat = $db->prepare('SELECT username, password FROM user WHERE username = ?');
        $resultat->execute(array($_POST['username']));
        if($resultat == true)
        {
            $user = $resultat->fetch();
            if (password_verify($_POST['password'], $user['password']))
            {
                echo 'cool';
            }else{
                throw new Exception('mauvais mot de passe');
            }
        }

    }
}