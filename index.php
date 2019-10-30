<?php
require 'vendor/autoload.php';
use App\Controller;
try
{
if (isset($_GET['access']))
{
    if ($_GET['access'] == 'userConnect')
    {
        userConnect();
    }
}
}
catch (Exception $e)
{
    echo 'Erreur:' . $e->getMessage();
    require('ErrowView.php');
}