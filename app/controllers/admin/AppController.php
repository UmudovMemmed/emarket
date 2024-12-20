<?php

namespace app\controllers\admin;

use core\Controller;

use Valitron\Validator;


class AppController extends Controller
{
    public false|string $layout = 'admin/app';



    public function validateCategoryForm()
    {


        $categoryName = trim($_POST['category_name'] ?? '');
        $categoryImage = $_FILES['category_image'];
        $excerpt = trim($_POST['excerpt'] ?? '');
        $keywords = trim($_POST['keywords'] ?? '');
        $slug = trim($_POST['slug'] ?? '');

        $description = trim($_POST['description'] ?? '');
        // Validator sınıfından bir örnek oluşturuluyor
        $v = new Validator([
            'categoryname' => $categoryName,
            'categoryImage' => $categoryImage['name'],
            'excerpt' => $excerpt,
            'keywords' => $keywords,
            'slug' => $slug,

            'description' => $description,
        ]);

        // Gerekli alanların kontrolü
        $v->rule('required', 'categoryname')->message('Kateqoriya adı sahəsi boş ola bilməz');
        $v->rule('required', 'categoryImage')->message('Kateqoriya Şəkili boş ola bilməz');
        $v->rule('required', 'excerpt')->message('Excerpt sahəsi boş ola bilməz');
        $v->rule('required', 'keywords')->message('Keywords sahəsi boş ola bilməz');
        $v->rule('required', 'description')->message('Description sahəsi boş ola bilməz');
        $v->rule('required', 'slug')->message('Slug sahəsi boş ola bilməz');


        // Şekil dosyasının doğrulama işlemleri
        if ($categoryImage['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['errors'][] = 'Şəkil yüklənərkən problem yarandı';
        } elseif (!getimagesize($categoryImage['tmp_name'])) {
            $_SESSION['errors'][] = 'Yüklənən fayl şəkil deyil';
        }

        // Form doğrulama işlemi
        if (!$v->validate()) {
            $_SESSION['errors'] = $v->errors();
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }


    public function validateProductForm()
    {

        $productName = trim($_POST['product_name'] ?? '');
        $productImage = $_FILES['product_image'];
        $excerpt = trim($_POST['excerpt'] ?? '');
        $keywords = trim($_POST['keywords'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $content = $_POST['content'] ?? '';
        $price = trim($_POST['price'] ?? '');
        $oldPrice = trim($_POST['old_price'] ?? '');
        $qty = trim($_POST['qty'] ?? '');


        $v = new Validator([
            'productName' => $productName,
            'productImage' => $productImage['name'],
            'excerpt' => $excerpt,
            'content' => $content,
            'keywords' => $keywords,
            'slug' => $slug,
            'description' => $description,
            'price' => $price,
            'oldPrice' => $oldPrice,
            'qty' => $qty,
        ]);


        $v->rule('required', 'productName')->message('Məhsul adı sahəsi boş ola bilməz');
        $v->rule('required', 'productImage')->message('Məhsul şəkli boş ola bilməz');
        $v->rule('required', 'excerpt')->message('Qısa məlumat sahəsi boş ola bilməz');
        $v->rule('required', 'keywords')->message('Açar sözlər sahəsi boş ola bilməz');
        $v->rule('required', 'slug')->message('Slug sahəsi boş ola bilməz');
        $v->rule('required', 'description')->message('Təsvir sahəsi boş ola bilməz');
        $v->rule('required', 'price')->message('Qiymət sahəsi boş ola bilməz');
        $v->rule('required', 'qty')->message('Miqdar sahəsi boş ola bilməz');
        $v->rule('required', 'content')->message('Content sahəsi boş ola bilməz');
        $v->rule('numeric', 'price')->message('Qiymət yalnız rəqəmlərdən ibarət olmalıdır');
        $v->rule('numeric', 'oldPrice')->message('Köhnə qiymət yalnız rəqəmlərdən ibarət olmalıdır');
        $v->rule('numeric', 'qty')->message('Miqdar yalnız rəqəmlərdən ibarət olmalıdır');


        if ($productImage['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['errors'][] = 'Şəkil yüklənərkən problem yarandı';
        } elseif (!getimagesize($productImage['tmp_name'])) {
            $_SESSION['errors'][] = 'Yüklənən fayl şəkil deyil';
        }

        if (!$v->validate()) {
            $_SESSION['errors'] = $v->errors();
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    }









}