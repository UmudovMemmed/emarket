<?php

namespace app\models;

use RedBeanPHP\R;

class Search extends AppModel
{
    public function get_product($query, $offset, $limit): array
    {
        return R::getAll("SELECT p.*, pd.* FROM products p 
            JOIN product_description pd ON p.id = pd.product_id 
            WHERE p.status = 1 AND p.hit = 1 AND pd.title LIKE :query 
            LIMIT :offset, :limit",
            [
                ':query' => '%' . $query . '%',
                ':offset' => $offset,
                ':limit' => $limit
            ]
        );
    }

    public function get_product_count($query): int
    {
        return (int) R::getCell("SELECT COUNT(*) FROM products p 
            JOIN product_description pd ON p.id = pd.product_id 
            WHERE p.status = 1 AND p.hit = 1 AND pd.title LIKE :query",
            [':query' => '%' . $query . '%']
        );
    }
}
