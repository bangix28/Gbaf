<?php


namespace App\Controller;
use App\Model\CommentManager;


class CommentController
{
    private $commentManager = null;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }


}