<?php
use Core\Session;
use Core\ValidationException;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';

session_start();

require BASE_PATH . "Core/functions.php";



/*
 * AUTO-LOADED BY spl_autoload_register
//require base_path("Database.php");
//require base_path("Response.php");
*/
//require base_path("Core/Router.php");

require base_path('bootstrap.php');
$router = new Core\Router();

$routes = require base_path("routes.php");

//parse_url($uri) separate path from query E.g. /contact?foo=bar path=/contact query=?foo=bar
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
try {
    $router->route($uri,$method);
}catch (ValidationException $exception){
    Session::flash('errors', $exception->errors);
    Session::flash('old',$exception->errors);
    redirect($router->previousUrl());
}

Session::unflash();

//routeToController($uri,$routes);

/*

$posts = $db->query("select * from posts where id = 1")
           ->fetch(); //fetch all executed query results and store them inside $posts as an array(ASSOCIATIVE);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
};
*/