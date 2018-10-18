<?php

namespace app\Http;

class Request
{
    public $request;

    public function redirect($uri){
        header('Location: ' . $uri);
    }

    public function isPost()
    {
        (($_SERVER['REQUEST_METHOD'] == "POST") ? $this->request = true : $this->request = false);
        return $this->request;
    }
}