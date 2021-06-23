<?php

namespace app\core;
/**
 * Class Response
 * 
 * @author Ryan Milton <rmann0302@gmail.com>
 * edited from a tutorial done on https://www.youtube.com/c/TheCodeholic
 * @package app\core
 * 
 **/
class Response 
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}