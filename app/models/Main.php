<?php

namespace app\models;

use RedBeanPHP\R;

class Main extends AppModel
{

    public function getHits($limit): array
    {


        return R::getAll("SELECT p.*, pd.* FROM products p 
         JOIN product_description pd ON p.id = pd.product_id 
         WHERE p.status = 1 AND p.hit = 1 
        LIMIT ?", [$limit]);
    }

    public function getAllCategoriesWithDescription(): array
    {
        return R::getAll("SELECT c.*, cd.* FROM  categories c
        JOIN  category_description cd ON c.id = cd. category_id ");
    }


}