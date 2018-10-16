<?php

use app\Models\User;
use app\Http\Request;

class UserController extends \app\Http\Controllers\Controller
{
    // Войти
    public function signIn()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "У нас POST";
        }
        else{
            self::make('signin');
        }
    }

    // Регистрация
    public function signUp()
    {
        $validate = new \app\Validator();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => htmlspecialchars($_POST['login']),
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password']),
                'confirm' => htmlspecialchars($_POST['confirm'])
            ];

            if($data['password'] === $data['confirm'])
            {
                $result = $validate->check($data, [
                    'name' => 'required|min_len,2',
                    'email' => 'required|min_len,4|max_len,50',
                    'password' => 'required|alpha_numeric|min_len,8'
                ]);

                if($result)
                {
                    (new User())->create(array_slice($data,0,count($data)-1));
                    (new Request())->redirect("/welcome-back");
                }
            }
            else{
                echo 'Пароли не совпадают';
            }
        }
        else{
            self::make('signup');
        }
    }

    // Восстановление пароля
    public function retrievePassword()
    {

    }
}