<?php

namespace app\controllers;
use core\Controller;
// use app\models\Wishlist;
use app\models\AppModel;
use app\widgets\language\LanguageWidget;
use core\App;
use core\Language;
use RedBeanPHP\R;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel;


    }

}