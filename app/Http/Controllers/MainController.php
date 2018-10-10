<?php

class MainController extends \app\Http\Controllers\Controller
{
    public function index()
    {
        self::make('main',[
            'success' => ['name' => 'jake']
        ]);
    }
}