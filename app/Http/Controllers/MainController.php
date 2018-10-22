<?php

use app\Models\User;

class MainController extends \app\Http\Controllers\Controller
{
    public function index()
    {
        if(!self::isAuth())
        {
            exit(self::make('welcome'));
        }

        $user = (new User())->getById($_SESSION['id']);
        self::make('main', ['user' => $user]);
        unset($user);
    }
}