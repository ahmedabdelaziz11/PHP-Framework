<?php
namespace app\controllers;

use app\core\controller;
use app\core\Request;

class SiteController extends controller
{
    public function home()
    {
        return $this->render('home',[
            'name' => 'ahmed abdelaziz',
            'email' => 'ahmeddev101@gmail.com',
        ]);
    }


    public function contact(Request $request)
    {
        return $this->render('contact',$request->getBody());
    } 

}