<?php
namespace app\core;

class controller
{
    public function render(string $view,$params = [])
    {
        return Application::$app->router->renderView($view,$params);
    }
}