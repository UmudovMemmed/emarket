<?php

namespace app\models;

use RedBeanPHP\R;

class Wishlist extends AppModel
{
    // Ürünün var olup olmadığını kontrol eder
    public function get_product($id)
    {
        return R::getCell("SELECT id FROM products WHERE status = 1 AND id = ?", [$id]);
    }

    // Ürünü istek listesine ekler
    public function add_to_wishlist($id)
    {
        // Mevcut istek listesi ürünlerinin ID'lerini alır
        $wishlistIds = self::get_wishlist_ids();

        // Eğer istek listesi boşsa, yeni ürünü doğrudan ekler
        if (!$wishlistIds) {
            setcookie('wishlist', $id, time() + 60 * 60 * 24 * 30, '/');
        } else {
            // Eğer ürün istek listesinde yoksa ekler
            if (!in_array($id, $wishlistIds)) {
                // Liste 5 üründen fazlaysa ilk ekleneni çıkarır
                if (count($wishlistIds) > 5) {
                    array_shift($wishlistIds);
                }

                // Yeni ürünü listeye ekler ve çerezde günceller
                $wishlistIds[] = $id;
                $wishlistIds = implode(',', $wishlistIds);
                setcookie('wishlist', $wishlistIds, time() + 60 * 60 * 24 * 30, '/');
            }
        }
    }

    // Çerezdeki istek listesi ürünlerinin ID'lerini alır
    public static function get_wishlist_ids(): array
    {
        $wishlist = $_COOKIE['wishlist'] ?? '';

        // Çerez doluysa, ID'leri diziye dönüştürür
        if ($wishlist) {
            $wishlist = explode(',', $wishlist);
        }

        // ID'leri tam sayıya çevirir ve en fazla 4 ürünü alır
        if (is_array($wishlist)) {
            $wishlist = array_slice($wishlist, 0, 4);
            $wishlist = array_map('intval', $wishlist);
            return $wishlist;
        }
        return [];
    }

    // İstek listesindeki ürünleri getirir
    public function get_products(): array
    {
        $wishlistIds = self::get_wishlist_ids();

        // Eğer istek listesinde ürün varsa, onları veritabanından alır
        if ($wishlistIds) {
            $wishlistIds = implode(',', $wishlistIds);
            return R::getAll("SELECT p.*, pd.* FROM  products p 
                JOIN product_description pd ON p.id = pd.product_id 
            WHERE p.status = 1 AND p.id IN ($wishlistIds) LIMIT 6");
        }
        return [];
    }

    // İstek listesinden ürünü çıkarır
    public function delete_from_wishlist($id): bool
    {
        $wishlistIds = self::get_wishlist_ids();

        // İstek listesinde ürün varsa bulur ve siler
        $key = array_search($id, $wishlistIds);
        if (false !== $key) {
            unset($wishlistIds[$key]);

            // Güncellenmiş istek listesi çerezde saklanır veya boş ise çerez silinir
            if ($wishlistIds) {
                $wishlistIds = implode(',', $wishlistIds);
                setcookie('wishlist', $wishlistIds, time() + 60 * 60 * 24 * 30, '/');
            } else {
                setcookie('wishlist', '', time() - 3600, '/');
            }
            return true;
        }
        return false;
    }
}
