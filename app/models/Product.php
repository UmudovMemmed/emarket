<?php

namespace app\models;

use RedBeanPHP\R;

class Product extends AppModel
{
    public function get_product($slug): array
    {
        return R::getRow("SELECT p.*, pd.* FROM  products p 
            JOIN product_description pd ON p.id = pd.product_id 
        WHERE p.status = 1 AND p.slug = ?", [$slug]);
    }


    public function getCategoryBySlug($slug): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                      JOIN category_description cd ON c.id = cd.category_id
                      WHERE c.id = ?", [$slug]);
    }

    public function getAllCategoriesWithDescription(): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                          JOIN category_description cd ON c.id = cd.category_id");
    }









}