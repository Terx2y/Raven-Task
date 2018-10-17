<?php

spl_autoload_register();
$console = new \app\Console\BenderLogic();

if ($argv[1] == "-make")
{
    if(!empty($argv[2])) {
        switch ($argv[2]) {
            case 'user:':
                (!empty($argv[3]) ? $console->make($argv[3] . " " . $argv[4], "user") : exit("Argument " . $argv[2] . " should have value"));
                break;
            default:
                exit("Unknown parameter: " . $argv[2]);
                break;
        }
    }
    else{
        exit("\n\tBender usage: -command [-make] parameter: [user:] name\n");
    }
}
else{
    exit("Unknown command: " . "'" . $argv[1] . "'\nBender usage: -command [-make] parameter: [user:] name\n");
}