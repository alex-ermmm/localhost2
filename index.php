<?php
//include'app/Controller/User.php';
use Core\RouteExeption;

include 'vendor/autoload.php';
/*

    spl_autoload_register(function ($classname) {
        $parts = explode('\\', $classname);
        $filePath = strtolower($parts[0]);
        $size = sizeof($parts);
        for ($i = 1; $i < $size; $i++) {
            $filePath .= DIRECTORY_SEPARATOR . $parts[$i];
        }

        $filePath .= '.php';

        print_r($filePath);
        echo "\n";

        require_once $filePath;

    });*/
/*
$app  = new \Core\Application();

echo "\n";

$userController = new \App\Controller\User();
$userController->IndexAction();
echo "\n";

$login = new \App\Controller\Auth\Login();
$login->indexAction();
echo "\n";*/

$app = new \Core\Application();
$app->run();

//$route = new \Core\Route();





?>

