<?php

require_once __DIR__ .'/../vendor/autoload.php';
use app\core\Application;

$app = new Application(dirname(__DIR__));

require_once '../routes/web.php';


$app->run();