<?php

use Core\Response;
use Core\Session;

function dd($val)
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}

function checkURL($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code); //send status E.g. 404 if no route is in lookup table
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path . '.view.php'); //views/index.view.php
}

function redirect($path){
    header("location: {$path}");
    exit();
}
function old($key,$default = null){
      return  Session::get('old')[$key] ?? $default;
}