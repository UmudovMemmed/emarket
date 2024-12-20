<?php

namespace app\controllers;

use RedBeanPHP\R;

/** @property Cart $model */
class CartController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Sebet');

    }
    public function addAction()
    {
        $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;
        $id = $_GET['id'] ?? null;
        $_SESSION['cart'] = $_SESSION['cart'] ?? [];

        if ($id) {
            $product = $this->model->get_product($id);
            if ($product) {

                $_SESSION['cart'][$id]['qty'] = ($_SESSION['cart'][$id]['qty'] ?? 0) + $qty;


                $_SESSION['cart'][$id] += [
                    'id' => $product['id'],
                    'title' => $product['title'],
                    'price' => $product['price'],
                    'img' => $product['img'],
                    'old_price' => $product['old_price'],
                    'slug' => $product['slug'],
                ];
            }


            $_SESSION['sum.qty'] = 0;
            $_SESSION['sum.price'] = 0.0;

            foreach ($_SESSION['cart'] as $item) {
                $_SESSION['sum.qty'] += $item['qty'];
                $_SESSION['sum.price'] += $item['price'] * $item['qty'];
            }
        } else {
            $_SESSION['sum.qty'] = $_SESSION['sum.qty'] ?? 0;
            $_SESSION['sum.price'] = $_SESSION['sum.price'] ?? 0.0;
        }

        echo json_encode(['updatedQuantity' => $_SESSION['sum.qty']]);
        exit;
    }



    public function deleteAction()
    {
        $id = get('id');
        if (isset($_SESSION['cart'][$id])) {
            $this->model->delete_item($id);
        }

        redirect();
    }

    public function subtractqtyAction()
    {
        $id = get('id');
        if (isset($id)) {
            $this->model->subtract_item($id);
        }
        redirect();
    }

    public function addqtyAction()
    {
        $id = get('id');
        if (isset($id)) {
            $this->model->add_item($id);
        }
        redirect();
    }
}
