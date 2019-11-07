<?php
namespace App\Model;
use Exception;

/**
 * Class UserManager
 * @package App\Model
 */
class UserManager extends Manager
{

    /**
     * @return mixed
     */
    public function testUsername()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT EXISTS(SELECT username FROM user WHERE username = ?) AS username_exist');
        $req->execute(array($_POST['username']));
        $user = $req->fetchColumn();
        return $user;
    }

    /**
     *
     */
    public function userRegister()
    {
        $pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO user (username, password, name, lastname, question, answer) VALUES(?,?,?,?,?,?)');
        ;
        $user->execute(array($_POST['username'], $pass_hach, $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer']));

    }

    /**
     * @throws Exception
     */
    public function userConnect()
    {
        $db = $this->dbConnect();
        $resultat = $db->prepare('SELECT * FROM user WHERE username = ?');
        $resultat->execute(array($_POST['username']));
        if ($resultat == true)
        {$user = $resultat->fetch();
            $password = password_verify($_POST['password'], $user['password']);
            if ($password == true)
            {
                $_SESSION['id'] = $user['id'];
                header('Location:index.php?action=home');
            }else{
                throw new Exception('Mauvais identifiant');
            }
        }

    }
}