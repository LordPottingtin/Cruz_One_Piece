<?php

/**
 * COMPOSER addition
 * allows use of other program portions 
 * without the need to INCLUDE_ONCE on every file
 **/

//  followed a tutorial from https://www.youtube.com/c/TheCodeholic
//  edited to fit to my needs and pulled code from both
//  https://www.chartjs.org/ AND https://getbootstrap.com/ 
//  within project
require_once __DIR__.'\..\vendor\autoload.php';

use app\controllers\SiteController;
use app\core\Application;


$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);

$app->run();