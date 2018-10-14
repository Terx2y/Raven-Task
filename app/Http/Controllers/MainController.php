<?php

class MainController extends \app\Http\Controllers\Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_ready'])){
            self::make('welcome');
        }
        else {
            self::make('main', ['success' => ['name' => 'jake']]);
        }
    }
}