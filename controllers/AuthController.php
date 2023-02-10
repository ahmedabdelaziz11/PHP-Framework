<?php

namespace app\controllers;

use app\core\controller;

class AuthController extends controller
{

    public function login()
    {
        return $this->render('login');
    }


    public function register()
    {
        return $this->render('register');
    }
}
