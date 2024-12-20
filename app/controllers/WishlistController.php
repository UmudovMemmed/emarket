<?php

namespace app\controllers;

/** @property Wishlist $model */


class WishlistController extends AppController
{

    public function indexAction()
    {

        $products = $this->model->get_products();
        $this->setMeta('Sevimliler');
        $this->set(compact('products'));
    }

    public function addAction()
    {

        $id = get('id');
        if (!$id) {
            $result = ['type' => 'error', 'text' => 'Bir hata oluşdu, zəhmət olmasa təkrar yoxlayın'];
            exit(json_encode($result));
        }
        $product = $this->model->get_product($id);
        if ($product) {
            $this->model->add_to_wishlist($id);
            $result = ['type' => 'success', 'text' => 'Məhsul uğurla istək siyahısına əlavə edildi!'];
        } else {
            $result = ['type' => 'error', 'text' => 'Məhsul ID düzgün deyil.'];
        }
        exit(json_encode($result));
    }

    public function deleteAction()
    {

        $id = get('id');
        ($this->model->delete_from_wishlist($id))
            ? $result = ['type' => 'error', 'text' => 'Məhsul uğurla istək siyahısınadan silindi!']
            : $result = ['type' => 'error', 'text' => 'Məhsul ID düzgün deyil.'];
        exit(json_encode($result));

    }

}
