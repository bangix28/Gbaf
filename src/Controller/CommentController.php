<?php


namespace App\Controller;


class CommentController
{
    private $commentManager = null;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }
}