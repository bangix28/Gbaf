<?php
namespace App\Model;
use App\Model\Manager;
use Exception;

/**
 * Class UserManager
 * @package App\Model
 */
class UserManager
{

    private $manager = null;

    public function __construct()
    {
        $this->manager = new Manager();
    }

    /**
     * @return mixed
     */
    public function testUsername()
    {

        $req = $this->manager->dbConnect()->prepare('SELECT EXISTS(SELECT username FROM user WHERE username = ?) AS username_exist');
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
        $user = $this->manager->dbConnect()->prepare('INSERT INTO user (username, password, name, lastname, question, answer) VALUES(?,?,?,?,?,?)');
        ;
        $user->execute(array($_POST['username'], $pass_hach, $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer']));

    }

    /**
     * @throws Exception
     */
    public function userConnect()
    {
        $resultat = $this->manager->dbConnect()->prepare('SELECT * FROM user WHERE username = ?');
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