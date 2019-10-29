<?php

require 'vendor/autoload.php';
try
{

}
catch (Exception $e)
{
    echo 'Erreur:' . $e->getMessage();
    require('ErrowView.php');
}