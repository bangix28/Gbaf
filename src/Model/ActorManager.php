<?php


namespace App\Model;
use App\Model\Manager;

/**
 * Class ActorManager
 * @package App\Model
 */
class ActorManager
{
    /**
     * @var \App\Model\Manager|null
     */
    private $manager = null;

    /**
     * ActorManager constructor.
     */
    public function __construct()
    {
        $this->manager = new Manager();
    }

    /**
     * @return false|\PDOStatement
     */
    public function getActors()
    {
        $getActors = $this->manager->dbConnect()->query('SELECT actor_id, name, logo, title, description FROM actor ORDER BY actor_id DESC LIMIT 0, 6');
        return $getActors;
    }

    /**
     *
     */
    public function addactor()
    {
        $logo = htmlspecialchars($_FILES['logo']['name']);
        $req = $this->manager->dbConnect()->prepare('INSERT INTO actor (name, logo, link, description) VALUES (?,?,?,?)');
        $req->execute(array($_POST['name'],$logo,$_POST['link'],$_POST['description']));
    }

    public function imageVerification()
    {
        if ($_FILES['logo']['size'] <= 1000000)
        {
            $infosfiles = pathinfo($_FILES['logo']['name']);
            $uploadExtension = $infosfiles['extension'];
            $authorizedExtension = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($uploadExtension, $authorizedExtension))
            {
                move_uploaded_file($_FILES['logo']['tmp_name'],'images/upload_images/' . basename($_FILES['logo']['name']));
                echo "L'envoi a bien été effectué !";
                return $upload = true;
            }

        }
    }

    public function actorNameVerification()
    {
        $req = $this->manager->dbConnect()->prepare('SELECT EXISTS(SELECT name FROM actor WHERE name = ?) AS name_exist');
        $req->execute(array($_POST['name']));
        $actorName = $req->fetchColumn();
        return $actorName;
    }
}