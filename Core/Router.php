<?php

namespace Core;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] =
            [
                'method' => $method,
                'uri' => $uri,
                'controller' => $controller,
                'middleware'=> null
            ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                //apply the Middleware
                    Middleware::resolve($route['middleware']);
                return require base_path("Http/controllers/" . $route['controller']); //controllers/notes/create.view.php
            }
        }
        $this->abort();
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }
    protected function abort($code = 404)
    {
        http_response_code($code); //send status E.g. 404 if no route is in lookup table
        require base_path("views/{$code}.php");
        die();
    }
}


//function routeToController($uri,$routes){
//    if (array_key_exists($uri,$routes)){
//        require base_path($routes[$uri]);
//    }
//    else{
//        abort();
//    }
//}


//
