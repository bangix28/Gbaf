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
         $listActors = $this->manager->dbConnect()->prepare('SELECT actor_id, name, logo, link, description FROM actor ORDER BY actor_id DESC LIMIT 0, 6');
         $listActors->execute();
         return $listActors;
    }

    public function getActor()
    {
        $actor = $this->manager->dbConnect()->prepare('SELECT actor_id, name, logo, link, description FROM actor WHERE actor_id = ? ');
        $actor->execute(array($_GET['id']));
        return $actor;
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

    /**
     * @return bool
     */
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

    /**
     * @return mixed
     */
    public function actorNameVerification()
    {
        $req = $this->manager->dbConnect()->prepare('SELECT EXISTS(SELECT name FROM actor WHERE name = ?) AS name_exist');
        $req->execute(array($_POST['name']));
        $actorName = $req->fetchColumn();
        return $actorName;
    }

    public function getLike()
    {
        $req = $this->manager->dbConnect()->prepare('SELECT like, dislike FROM actor WHERE actor_id = ?');
        $req->execute(array($actorId));
        return $req;
    }

    public function addLike()
    {
        $req = $this->manager->dbConnect()->prepare('UPDATE `actor` SET actor_like = ? ,actor_dislike = ? WHERE actor_id = ?');
        $req->execute(array($_));
    }

}