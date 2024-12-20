<?php

namespace app\controllers;
use RedBeanPHP\R;
use core\App;



/** @property Main $model */

class MainController extends AppController
{


    public function indexAction()
    {

        $sliders = R::findAll('sliders');
        $categories = $this->model->getAllCategoriesWithDescription();
        $products = $this->model->getHits(8);
        $cate = App::$app->setProperty("categories", $categories);
        $this->setMeta('Ana Sehife');
        $this->set(compact('sliders', 'products', 'categories'));

    }
}