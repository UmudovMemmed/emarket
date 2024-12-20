<?php

namespace app\models;

use RedBeanPHP\R;

class Cart extends AppModel
{

    public function get_product($id): array
    {
        return R::getRow("SELECT p.*, pd.* FROM  products p 
            JOIN product_description pd ON p.id = pd.product_id 
        WHERE p.status = 1 AND p.id = ?", [$id]);


    }
    public function delete_item($id)
    {
        $qty_minus = $_SESSION['cart'][$id]['qty'];
        $sum_minus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

        $_SESSION['sum.qty'] -= $qty_minus;
        $_SESSION['sum.price'] -= $sum_minus;

        unset($_SESSION['cart'][$id]);
    }

    public function subtract_item($id)
    {
        if ($_SESSION['cart'][$id]['qty'] > 0) {
            $_SESSION['sum.qty'] -= 1;
            $_SESSION['cart'][$id]['qty'] -= 1;

            $_SESSION['sum.price'] -= $_SESSION['cart'][$id]['price'];


            if ($_SESSION['cart'][$id]['qty'] == 0) {
                unset($_SESSION['cart'][$id]);
            }
        }


        if (empty($_SESSION['cart'])) {
            $_SESSION['sum.qty'] = 0;
            $_SESSION['sum.price'] = 0;
        }

        return $_SESSION['cart'][$id]['qty'] ?? 0;
    }

    public function add_item($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
            $_SESSION['sum.qty'] += 1;
            $_SESSION['sum.price'] += $_SESSION['cart'][$id]['price'];
        }

        return $_SESSION['cart'][$id]['qty'];
    }




}
