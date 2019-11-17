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
         $listActors = $this->manager->dbConnect()->prepare('SELECT actor_id, name, logo, link, description, tiny_desc FROM actor ORDER BY actor_id DESC LIMIT 0, 6');
         $listActors->execute();
         return $listActors;
    }

    public function getActor()
    {
        $actor = $this->manager->dbConnect()->prepare('SELECT * FROM actor WHERE actor_id = ?');
        $actor->execute(array($_GET['id']));
        return $actor;
    }

    /**
     *
     */
    public function addactor()
    {
        $logo = htmlspecialchars($_FILES['logo']['name']);
        $req = $this->manager->dbConnect()->prepare('INSERT INTO actor (name, logo, link, tiny_desc, description) VALUES (?,?,?,?,?)');
        $req->execute(array($_POST['name'],$logo,$_POST['link'],$_POST['description'], $_POST['tiny_desc']));
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

    public function addVote() {
        $req = $this->manager->dbConnect()->prepare('INSERT INTO vote(actor_id, user_id,vote) VALUES(?,?,?)');
        $req->execute(array($_GET['id'],$_SESSION['id'],$_GET['vote']));
    }

    public function getLike()
    {
        $req = $this->manager->dbConnect()->prepare('SELECT actor_like, actor_dislike FROM actor WHERE actor_id = ?');
        $req->execute(array($_GET['id']));
        $like = $req->fetch();
        return $like;
    }
    public function addLike($like)
    {
        var_dump($addLike = 1 + $like['actor_like']);
        $req = $this->manager->dbConnect()->prepare('UPDATE actor SET actor_like = ? WHERE actor_id = ?');
        $req->execute(array($addLike, $_GET['id']));
    }
    public function addDislike($like)
    {
        $addDislike = 1 + $like['actor_dislike'];
        $req = $this->manager->dbConnect()->prepare('UPDATE actor SET actor_dislike = ? WHERE actor_id = ?');
        $req->execute(array($addDislike, $_GET['id']));
    }


}