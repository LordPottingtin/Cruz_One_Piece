<?php

namespace app\core;

/**
 * Class Router
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\core
 * 
 **/


 /**
  * the way this is set up will allow growth for multiple routes 
  **/
class Router 
{
    public Request $request;
    public Response $response;
    protected array $routes= [];

    /**
     *Router Constructor
     *
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     *  
     **/
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * gets name of callback from URL and passes it to renderView  
     **/
    public function resolve()
    {
       $path= $this->request->getPath();
       $method = $this->request->getMethod();
       $callback = $this->routes[$method][$path] ?? false;
       if($callback === false){
           $this->response->setStatusCode(404);
           return $this->renderView("_404");
       }
       if (is_string($callback)){
           return $this->renderView($callback);
       }
       //turns callback into an object rather than class for call_user_func to still work
       if(is_array($callback))
       {
           $callback[0] = new $callback[0];
       }
       return call_user_func($callback);
    }

    /**
     * determines what view to show user based on callback given 
     **/
    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        if($view === 'home'){
            include_once Application::$ROOT_DIR."/views/$view.html";
        }else{
            include_once Application::$ROOT_DIR."/views/$view.php";}
        return ob_get_clean();
    }
}