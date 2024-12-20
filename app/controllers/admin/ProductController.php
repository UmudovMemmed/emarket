<?php

namespace app\controllers\admin;
use app\controllers\admin\AppController;
use app\models\admin\Product;


/** @property Product $model */

class ProductController extends AppController
{


    public function indexAction()
    {

        $products = $this->model->get_product();
        $this->setMeta('Məhsullar');

        $this->set(compact('products'));



    }

    public function addAction()
    {
        $this->setMeta('Yeni Məhsul Əlavə Et');

        if (!empty($_POST)) {

            // Kateqoriya seçilmədikdə xəbərdarlıq
            if (empty($_POST['category'])) {
                $_SESSION['error'] = 'Kateqoriya mütləq seçilməlidir!';
                $this->validateProductForm();
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }


            // Məhsul formasını təsdiqləyin


            // Şəkil yüklənməsi
            $imagePath = $this->model->uploadProductImage($_FILES['product_image']);
            if ($imagePath === false) {
                $_SESSION['errors'][] = 'Şəkil yüklənə bilmədi';
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }

            // Məhsul məlumatlarını əlavə edin
            $productId = $this->model->addProduct(
                trim($_POST['slug'] ?? ''),
                $imagePath,
                trim($_POST['price'] ?? ''),
                trim($_POST['old_price'] ?? ''),
                trim($_POST['qty'] ?? ''),
                (int) ($_POST['category'] ?? 0),
                (int) ($_POST['status'] ?? 0),
                (int) ($_POST['hit'] ?? 0),
                trim($_POST['color'] ?? '')
            );

            if ($productId > 0) {
                // Məhsul təsviri məlumatlarını əlavə edin
                $this->model->addProductDescription(
                    $productId,
                    trim($_POST['product_name'] ?? ''),
                    trim($_POST['excerpt'] ?? ''),
                    trim($_POST['keywords'] ?? ''),
                    trim($_POST['description'] ?? ''),
                    trim($_POST['content'] ?? '')
                );

                $_SESSION['success'] = 'Məhsul uğurla əlavə olundu!';
            } else {
                $_SESSION['errors'][] = 'Məhsul əlavə oluna bilmədi';
            }

            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        // Kateqoriyaları alın
        $categories = $this->model->getAllCategoriesWithDescription();

        // Görünüşə məlumat göndərin
        $this->set(compact('categories'));
    }


    public function editAction()
    {

        $productId = get('id');
        $categories = $this->model->getAllCategoriesWithDescription();
        $product = $this->model->get_products($productId);
        $category_id = $_POST['category'] ?? $product[0]['category_id'];



        if (!empty($_POST)) {


            try {

                $this->validateProductForm();

                $imagePath = $this->model->uploadProductImage($_FILES['product_image']);


                $this->model->product_update(
                    $productId,
                    $category_id,
                    $_POST['product_name'],
                    $_POST['excerpt'],
                    $_POST['content'],
                    $_POST['description'],
                    $_POST['keywords'],
                    $_POST['slug'],
                    $imagePath
                );


                $_SESSION['success'] = 'Məhsul uğurla yeniləndi!';


                header('Location: http://e-market.loc/admin/product');
                exit;
            } catch (\Exception $e) {

                $_SESSION['error'] = $e->getMessage();
                header('Location: /admin/category/edit?id=' . $productId);
                exit;
            }
        }


        $this->setMeta('Məhsul Düzəlişi');

        $this->set(compact('product', 'categories'));
    }

    public function deleteAction()
    {
        $productId = get('id');

        $result = $this->model->delete_product($productId);
        if ($result) {
            $_SESSION['success'] = 'Məhsul uğurla silindi!';
        }
        redirect();
    }




}

