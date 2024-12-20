<?php

namespace app\models\admin;
use RedBeanPHP\R;

use app\models\AppModel;


class Main extends AppModel
{

    public function get_orders()
    {
        return R::getAll("SELECT * FROM orders LIMIT 5");
    }

    public function get_users()
    {
        return R::getAll("SELECT * FROM user LIMIT 5");
    }



}