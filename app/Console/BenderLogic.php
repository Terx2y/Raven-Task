<?php

namespace app\Console;
use app\OuterWorld\DataBase;

class BenderLogic
{
    private $user = []; // Here we'll keep our user data
    private $modelName = []; // Here we'll keep our model data
    private $controllerName = []; // Here we'll keep our controller data

    public function __construct()
    {
        DataBase::initialize(); // Инициализация работы с БД
    }

    public function __call($name, $arguments)
    {
        if($arguments[1] == "user")
        {
            $this->user = ["name" => $arguments[0]];
            self::setPassword($this->user);
        }
    }

    public static function setPassword($user)
    {
        echo "Here we will generate password for " . $user['name'];
    }
}