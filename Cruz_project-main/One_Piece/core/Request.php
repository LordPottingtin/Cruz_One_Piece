<?php 
namespace app\core;
/**
 * Class Request
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\core
 * 
 **/

 class Request
 {
     public function getPath()
     {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false)
        {
            return $path;
        }
        $path = substr($path, 0, $position);
     }

     public function getMethod()
     {
        return strtolower($_SERVER['REQUEST_METHOD']);
     }
 }