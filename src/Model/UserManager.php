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
        $image = 'images/utilisateur.png';
        $pass_hach = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = $this->manager->dbConnect()->prepare('INSERT INTO user (username, password, name, lastname, question, answer, image) VALUES(?,?,?,?,?,?,?)');
        ;
        $user->execute(array($_POST['username'], $pass_hach, $_POST['name'], $_POST['lastname'], $_POST['question'], $_POST['answer'], $image));

    }

    /**
     * @throws Exception
     */
    public function userConnect()
    {
        $resultat = $this->manager->dbConnect()->prepare('SELECT id_user, username, password FROM user WHERE username = ?');
        $resultat->execute(array($_POST['username']));
        if ($resultat == true) {
            $user = $resultat->fetch();
            return $user;
        }
    }

    public function getUser()
    {
        $userId = $_SESSION['id'];
        $req = $this->manager->dbConnect()->prepare('SELECT * FROM user WHERE id_user = ?');
        $req->execute(array($userId));
        $user = $req->fetch();
        return $user;
    }

    public function editUser()
    {
        $req = $this->manager->dbConnect()->prepare('UPDATE `user` SET password = ?, name = ?, lastname = ?, question = ?, answer = ?, image = ? WHERE id_user = ?');
        $req->execute($_SESSION['id']);

    }

}