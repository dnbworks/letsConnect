<?php


require_once __DIR__ ."/../vendor/autoload.php";

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\MismatchController;

$app = new Application(dirname(__DIR__));

$app->router->get("/", function(){
    return "homepage";
});

$app->router->get("/", [MismatchController::class, 'index']);
$app->router->get("/edit-profile", [MismatchController::class, 'edit']);
$app->router->post("/edit-profile", function(){
    return "handling submited data";
});

$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/login", [AuthController::class, 'login']);
$app->router->get("/register", [AuthController::class, 'register']);
$app->router->post("/register", [AuthController::class, 'register']);

$app->run();