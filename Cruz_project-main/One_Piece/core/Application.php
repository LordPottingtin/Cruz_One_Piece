<?php

namespace app\core;


/**
 * Class Application
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\core
 * 
 **/


class Application
{
    /**
     * creates classes from other files to be used here
     * **/
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * runs functions within Router to piece together the application
     **/
    public function run()
    {
        echo $this->router->resolve();
    }
}