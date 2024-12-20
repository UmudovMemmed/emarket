<?php

namespace app\models;

use RedBeanPHP\R;

class Category extends AppModel
{


    public function getAllCategoriesWithDescription(): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                          JOIN category_description cd ON c.id = cd.category_id");
    }

    public function get_product($category_id, $offset, $limit, $price_ranges, $color_filter): array
    {
        $price_condition = isset($price_ranges) && count($price_ranges) === 2
            ? "AND p.price BETWEEN ? AND ?"
            : "";

        $color_condition = $color_filter !== 'all'
            ? "AND p.color = ?"
            : "";

        $params = [$category_id];
        if ($price_condition) {
            $params[] = $price_ranges[0];
            $params[] = $price_ranges[1];
        }
        if ($color_condition) {
            $params[] = $color_filter;
        }

        $params[] = $offset;
        $params[] = $limit;

        return R::getAll("SELECT p.*, pd.* FROM products p 
                          JOIN product_description pd ON p.id = pd.product_id 
                          WHERE p.status = 1 
                          AND p.category_id = ?
                          $price_condition
                          $color_condition
                          LIMIT ?, ?", $params);
    }

    public function get_product_count($category_id): int
    {
        return (int) R::getCell("SELECT COUNT(*) FROM products p 
                                  WHERE p.status = 1 AND p.category_id = ?", [$category_id]);
    }

    public function getCategoryBySlug($slug): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                          JOIN category_description cd ON c.id = cd.category_id
                          WHERE c.slug = ?", [$slug]);
    }
}
