<?php
use app\Models\User;
use app\Http\Request;
use app\Session;

class UserController extends \app\Http\Controllers\Controller
{
    // Войти
    public function signIn()
    {
        if (!(new Request())->isPost()) {
            exit(self::make('signin'));
        }

        $validate = new \app\Validator();

        $data = [
            'email' => htmlspecialchars($_POST['email']),
            'password' => htmlspecialchars($_POST['password'])
        ];

        $result = $validate->check($data, [
            'email' => 'required|min_len,4|max_len,50',
            'password' => 'required|alpha_numeric|min_len,8'
        ]);

        if(!$result)
        {
            $errors = $validate->errorMessages();
            exit(self::make('signin', ['errors' => $errors]));
        }

        // Check by EMail if user exists
        $user = new User();
        $getUser = $user->checkUser($data['email']);

        if(empty($getUser))
        {
            exit(self::make('signin', ['errors' => ['errors' => "Такого пользователя не существует"]]));
        }

        // Ждём, когда в GUMP реализуют сравнение полей
        if($data['password'] === $getUser['password'])
        {
            (new Session())->setUser($getUser);
            (new Request())->redirect("/");
        }
        else
        {
            self::make('signin', ['errors' => ['errors' => "Введён неверный пароль"]]);
        }
        // Всё ещё ждём, когда в GUMP реализуют сравнение полей
    }

    // Регистрация
//    public function signUp()
//    {
//        $validate = new \app\Validator();
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $data = [
//                'name' => htmlspecialchars($_POST['login']),
//                'email' => htmlspecialchars($_POST['email']),
//                'password' => htmlspecialchars($_POST['password']),
//                'confirm' => htmlspecialchars($_POST['confirm'])
//            ];
//
//            if($data['password'] === $data['confirm'])
//            {
//                $result = $validate->check($data, [
//                    'name' => 'required|min_len,2',
//                    'email' => 'required|min_len,4|max_len,50',
//                    'password' => 'required|alpha_numeric|min_len,8'
//                ]);
//
//                if(!$result)
//                {
//                    var_dump($result);
//                }
//                (new User())->create(array_slice($data,0,count($data)-1));
//                (new Request())->redirect("/welcome-back");
//
//            }
//            else{
//                echo 'Пароли не совпадают';
//            }
//        }
//        else{
//            self::make('signup');
//        }
//    }

    public function logout()
    {
        ((new Session())->clearSession());
        (new Request())->redirect("/");
    }

    // Восстановление пароля
    public function retrievePassword()
    {

    }
}