<?php


namespace App\Controller;
use App\Model\CommentManager;


class CommentController extends MainController
{
    private $commentManager = null;

    public function __construct()
    {
        parent::__construct();
        $this->commentManager = new CommentManager();
    }


}