<?php
// Application base controller

namespace app\Http\Controllers;

use Philo\Blade\Blade;

abstract class Controller
{
    public static function make($page, array $args = [])
    {
        $views = $_SERVER['DOCUMENT_ROOT']. '/views';
        $cache = $_SERVER['DOCUMENT_ROOT'] . '/storage/application/cache';

        $blade = new Blade($views, $cache);
        echo $blade->view()->make($page)->with($args)->render();
    }
}