<?php
/**
 * Created by PhpStorm.
 * User: Terx2y
 * Date: 10.10.2018
 * Time: 14:28
 * Mission: Application routing system
 */

namespace app;
use app\Http\Response;

class Router
{
    // Here we'll gather all routes
    // uri => ControllerName@action
    private static $routeCollection = array();

    /*
     *  POST , GET methods instead of __call
     */
    public function __call($name, $arguments)
    {
        // Here we check if "$arguments" empty. if empty, we assign NULL
        $arguments[1] = isset($arguments[1]) ? $arguments[1] : null;
        self::$routeCollection[$arguments[0]] = $arguments[1]; // Assign "$arguments" to routes array
    }

    // Here we try to fetch routes
    public static function fetch()
    {
        $uri = $_SERVER['REQUEST_URI']; // Get our current url
        // Тут можно начать проверку регистрирован ли юзер
        // If we won't find  our /$uri/ in routes set, then 404
        if(!isset(self::$routeCollection[$uri])){
            exit(print Response::HTTP_NOT_FOUND);
        }
        // Else we send our ControllerName with an action to getPage
        self::getPage(self::$routeCollection[$uri]);
    }

    /**
     * @param $name = ControllerName + action
     * Here we get controller with action and divide it by @ on ControllerName and ActionName
     */
    public static function getPage($name)
    {
        $controller_name = substr($name, 0, strpos($name, '@'));
        $getAction = explode('@',$name);
        $action_name = end($getAction);

        // If file ControllerName doesn't exists, we add an error into error array, else we require it
        (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/Http/Controllers/' . $controller_name . '.php'))
            ? ($error = '</br></br>File ' . $controller_name . ' doesn\'t exists')
            : require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Http/Controllers/' . $controller_name . '.php';

        if (!empty($error))
        {
            exit($error);
        }
        else{

            if (!class_exists($controller_name)) {
                 exit('No such class: ' . $controller_name);
            }

            $classCopy = new $controller_name();

            if(method_exists($classCopy,$action_name))
            {
                $classCopy->$action_name();
            }
            else
            {
                unset($classCopy);
                exit('No such method: ' . $action_name);
            }
        }
    }
}