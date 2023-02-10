<?php

use app\controllers\AuthController;
use app\controllers\SiteController;


$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact','contact');
$app->router->post('/contact',[SiteController::class,'contact']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);