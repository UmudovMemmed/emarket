<?php

namespace app\controllers;

/** @property Category $model */

class CategoryController extends AppController
{
    public function viewAction()
    {
        $categorySlug = $this->route['slug'];
        $categories_id = $this->model->getCategoryBySlug($categorySlug);
        $categor = $this->model->getAllCategoriesWithDescription();


        $page = (int) ($_GET['page'] ?? 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $category_id = $categories_id[0]['category_id'];


        $total_products = $this->model->get_product_count($category_id);
        $total_pages = ceil($total_products / $limit);


        $price_range = isset($_GET['price']) && $_GET['price'] !== 'all'
            ? array_map('intval', explode('-', $_GET['price']))
            : [0, PHP_INT_MAX];


        $selected_color = $_GET['color'] ?? 'all';

        $products = $this->model->get_product($category_id, $offset, $limit, $price_range, $selected_color);

        $this->setMeta($categories_id[0]['title'], $categories_id[0]['description'], $categories_id[0]['keywords']);


        $this->set(compact('categories_id', 'products', 'page', 'total_pages', 'selected_color', 'categor', 'category_id'));




    }

}
