<?php

namespace app\controllers;
/**
 * Class SiteController
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\controllers
 * 
 **/
use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }
}