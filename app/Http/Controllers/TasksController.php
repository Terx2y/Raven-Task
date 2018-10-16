<?php
use app\Models\Task;
use app\Http\Request;

class TasksController extends \app\Http\Controllers\Controller
{
    public function index()
    {
        if(!self::isAuth())
        {
            (new Request())->redirect('/welcome-back');
        }
        $tasks = (new Task())->all(); // Here we get all data from "tasks" table

        self::make('tasks', [
            'success' => $tasks['success']
        ]);

        unset($tasks);
    }

    public function create()
    {
        $validate = new \app\Validator();
        $data = [
            'name' => htmlspecialchars($_POST['Name']),
            'description' => htmlspecialchars($_POST['Desc']),
            'priority' => htmlspecialchars($_POST['priority']),
            'deadline' => htmlspecialchars($_POST['deadline'])
        ];

        $result = $validate->check($data, [
            'name' => 'required|min_len,6',
            'description' => 'required|min_len,6|max_len,2048'
        ]);

        if($result)
        {
            $task = new Task();
            if($task->create($data) == true)
            {
                echo 'Задача успешно создана';
            }
            unset($task);
        }
    }

}