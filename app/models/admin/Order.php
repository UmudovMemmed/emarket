<?php

namespace app\models\admin;

use RedBeanPHP\R;


use app\models\AppModel;


class Order extends AppModel
{

    public function get_orders($limit, $offset, $search = '')
    {

        if ($search) {
            return R::getAll(
                "SELECT * FROM orders WHERE username LIKE ? LIMIT ? OFFSET ?",
                ['%' . $search . '%', (int) $limit, (int) $offset]
            );
        }

        return R::getAll("SELECT * FROM orders LIMIT ? OFFSET ?", [(int) $limit, (int) $offset]);
    }

    public function get_order($id)
    {

        return R::getAll("SELECT * FROM orders WHERE id = ?", [$id]);
    }



    public function get_total_orders($search = '')
    {

        if ($search) {
            return R::getCell(
                "SELECT COUNT(*) FROM orders WHERE username LIKE ?",
                ['%' . $search . '%']
            );
        }

        return R::getCell("SELECT COUNT(*) FROM orders");
    }


    public function order_delete($id)
    {
        return R::exec("DELETE FROM `orders` WHERE id = ?", [$id]);
    }

    public function confirm_order($order_id)
    {
        $order = R::load('orders', $order_id);
        if ($order->id) {
            $order->status = 1;
            R::store($order);
        }
    }

}





