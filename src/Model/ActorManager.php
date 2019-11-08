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
    public function addCreator()
    {
        $req = $this->manager->dbConnect()->prepare('INSERT INTO actor (name, logo, title, description) VALUES (?, ?, ?, ?,)');
        $req->execute(array($_POST['name'],$_POST['logo'], $_POST['title'],$_POST['description']));
    }
}