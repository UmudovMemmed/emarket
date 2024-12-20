<?php

namespace app\controllers;

use app\models\Product;
use RedBeanPHP\R;

/** @property Product $model */
class ProductController extends AppController
{
    public function viewAction()
    {

        $product = $this->model->get_product($this->route['slug']);
        $categor = $this->model->getAllCategoriesWithDescription();


        if (!$product) {
            $this->error_404();
            return;
        }


        $categories_id = $this->model->getCategoryBySlug($product['category_id']);

        if (empty($categories_id[0])) {
            $this->error_404();
            return;
        }




        $this->setMeta($product['title'], $product['description'], $product['keywords']);


        $this->set(compact('product', 'categories_id', 'categor'));
    }
}
