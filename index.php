<?php
session_start();
// App entry point
    error_reporting( E_ALL );
    spl_autoload_register();

    require "vendor/autoload.php";
    require_once "routes.php";