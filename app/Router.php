<?php
namespace App;

Class Router
{

    protected static $controller;
    protected static $action;
    protected static $props = [];
    
    protected static function load()
    {
        self::$controller = "App\\Controllers\\" . env('DEFAULT_CONTROLLER', 'HomeController');
        self::$action = env('DEFAULT_ACTION', 'index');
        
        if(isset($_GET['route']))
            $url = explode('/', filter_var(rtrim($_GET['route'], '/'), FILTER_SANITIZE_URL));
        
        if(isset($url[0])){
            self::$controller = "App\\Controllers\\" . ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }
        
        if(isset($url[1])){
            self::$action = $url[1];
            unset($url[1]);
        }
        
        if(!empty($url)){
            self::$props = array_values($url);
        }
    }

    public static function dispatch()
    {
        self::load();
        $controller = self::$controller;
        $action = self::$action;
        $props = self::$props;
        
        if(class_exists($controller)){
            $class = new $controller;
            if(method_exists($class, $action))
                return $class->$action($props);
            else
                return $class->index($props);
        } else {
            throw new \Exception("Controller {$controller} not found.");
        }
    }
}