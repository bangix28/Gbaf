<?php
require '../vendor/autoload.php';
use App\Controller;
use Tracy\Debugger;

use App\Router;
/* Required call to load the classes with the Composer Autoload */
require_once '../vendor/autoload.php';

$router = new Router();
/* Test Zone (uncomment Debugger to get Tracy & var_dump to get router object) */
Debugger::enable();
// var_dump($router);
/* Run application */
$router->run();