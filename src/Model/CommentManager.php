<?php


namespace App\Model;
use App\Model\Manager;


/**
 * Class CommentManager
 * @package App\Model
 */
class CommentManager
{
    /**
     * @var \App\Model\Manager|null
     */
    private $manager = null;

    /**
     * CommentManager constructor.
     */
    public function __construct()
    {
        $this->manager = new Manager();
    }

    /**
     * @param $actor_id
     * @return bool|\PDOStatement
     */
    public function getComments($actor_id)
    {
        $req = $this->manager->dbConnect()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE actor_id = ? ORDER BY comment_date DESC');
        $req->execute(array($actor_id));
        return $req;
    }

    /**
     * @param $author
     */
    public function addComment($author)
    {
        $req = $this->manager->dbConnect()->prepare('INSERT INTO comment(actor_id, comment_date, author, comment) VALUES (?,now(),?,?)');
        $req->execute(array($_GET['id'], $author, $_POST['comment']));
    }

    /**
     * @return int
     */
    public function nbrComment()
    {
       $req = $this->manager->dbConnect()->prepare('SELECT count(*) FROM comment WHERE actor_id = ?');
       $req->execute($_GET['id']);
       $nbrComment = count($req);
        return $nbrComment;
    }
}