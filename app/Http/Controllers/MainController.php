<?php

class MainController extends \app\Http\Controllers\Controller
{
    public function index()
    {
        if(!self::isAuth())
        {
            self::make('welcome');
        }
        else{
            self::make('main', ['success' => ['name' => $_SESSION['id']]]);
        }
    }
}