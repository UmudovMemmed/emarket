<?php

namespace app\controllers\admin;

use RedBeanPHP\R;

/** @property Main $model */

class MainController extends AppController
{


    public function indexAction()
    {

        $this->setMeta('Ana Sehife');

        if (empty($_SESSION['user']) || $_SESSION['user']['role'] == 'user') {
            redirect(ADMIN . '/login');
            exit;
        }

        if ($_SESSION['user']['role'] == 'admin' && $_SERVER['REQUEST_URI'] !== '/admin') {
            header("Location: http://e-market.loc/admin");
            exit;
        }


        $orders = R::count('orders');
        $users = R::count('user');
        $products = R::count('products');
        $orderss = $this->model->get_orders();
        $userss = $this->model->get_users();





        $this->set(compact('orders', 'users', 'products', 'orderss', 'userss'));



    }
}