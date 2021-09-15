<?php

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\MismatchController;
use Dotenv\Dotenv;

require_once __DIR__ ."/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PWD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get("/", function(){
    return "homepage";
});

$app->router->get("/", [MismatchController::class, 'index']);
$app->router->get("/home", [MismatchController::class, 'home']);
$app->router->get("/edit-profile", [MismatchController::class, 'edit']);
$app->router->post("/edit-profile", function(){
    return "handling submited data";
});

$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/login", [AuthController::class, 'login']);
$app->router->get("/register", [AuthController::class, 'register']);
$app->router->post("/register", [AuthController::class, 'register']);

$app->run();