<?php
namespace App\Model;
use Exception;

class UserManager extends Manager
{
    public function testUsername()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT EXISTS(SELECT * FROM user WHERE username = ?) AS username_exist');
        $req->execute(array($_POST['username']));
        $user = $req->fetchColumn();
        return $user;
    }
    public function userRegister()
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO user(username, password, user_name, lastname, question , asnwer ) VALUE (?,?,?,?,?,?)');
        $user->execute(array($_POST['username'],$_POST['password'],$_POST['user_name'],$_POST['lastname'],$_POST['question'],$_POST['answer']));

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