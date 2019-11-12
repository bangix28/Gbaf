<?php


namespace App\Model;
use App\Model\Manager;


class CommentManager
{
    private $manager = null;

    public function __construct()
    {
        $this->manager = new Manager();
    }

    public function getComments($actor_id)
    {
        $req = $this->manager->dbConnect()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE actor_id = ? ORDER BY comment_date DESC');
        $req->execute(array($actor_id));
        return $req;
    }

    public function getLike($actor_id)
    {
        $req = $this->manager->dbConnect()->prepare('SELECT actor_like, actor_dislike FROM actor WHERE actor_id = ?');
        $req->execute(array($actor_id));
        return $req;
    }

    public function addComment($author)
    {
        $req = $this->manager->dbConnect()->prepare('INSERT INTO comment(actor_id, comment_date, author, comment) VALUES (?,now(),?,?)');
        $req->execute(array($_GET['id'], $author, $_POST['comment']));
    }

    public function nbrComment()
    {
       $req = $this->manager->dbConnect()->prepare('SELECT count(*) FROM comment WHERE actor_id = ?');
       $req->execute($_GET['id']);
       $nbrComment = count($req);
        return $nbrComment;
    }
}