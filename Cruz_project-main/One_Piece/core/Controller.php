<?php
namespace app\core;
/**
 * Class Controller
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\core
 * 
 **/
class Controller 
{
    public function render($view)
    {
        return Application::$app->router->renderView($view);
    }
}