<?php

namespace app\controllers;

/** @property Search $model */

class SearchController extends AppController
{
    public function indexAction()
    {
        $query = $_GET['query'] ?? "";

        $page = (int) ($_GET['page'] ?? 1);
        $limit = 2;
        $offset = ($page - 1) * $limit;
        $total_products = $this->model->get_product_count($query);
        $total_pages = ceil($total_products / $limit);
        $products = $this->model->get_product($query, $offset, $limit);

        $this->setMeta("Axtaris");

        $this->set(compact('query', 'products', 'page', 'total_pages'));
    }
}
