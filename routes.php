<?php
/**
 * Our app navigation
 */

use app\Router as route;
$routes = new app\Router();

$routes->get("/", "MainController@index");
$routes->get("/tasks", "TasksController@index");
$routes->post("/add", "TasksController@create");
$routes->get("/favorites", "FavoriteController@getList");

$routes->get("/welcome-back", "UserController@signin");
$routes->get("/welcome", "UserController@signup");

route::fetch();