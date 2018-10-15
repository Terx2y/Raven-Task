<?php

namespace app\Http;


class Request
{
    public function redirect($uri){
        header('Location: ' . $uri);
    }
}