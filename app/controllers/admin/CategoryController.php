<?php


namespace app\controllers\admin;

use app\controllers\admin\AppController;
use app\models\admin\Category;


/** @property Category $model */
class CategoryController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Kateqoriyalar');
        $categories = $this->model->getAllCategoriesWithDescription();
        $this->set(compact('categories'));
    }



    public function addAction()
    {

        $categor = $this->model->getAllCategoriesWithDescription();


        if (!empty($_POST)) {


            $this->validateCategoryForm();
            $imagePath = $this->model->uploadCategoryImage($_FILES['category_image']);

            if ($imagePath === false) {
                $_SESSION['errors'][] = 'Şəkil yüklənə bilmədi';
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }


            $categoryId = $this->model->addCategory(
                trim($_POST['parent_category'] ?? 0),
                trim($_POST['slug'] ?? ''),
                $imagePath
            );



            if ($categoryId > 0) {

                $this->model->addCategoryDescription(
                    $categoryId,
                    trim($_POST['category_name'] ?? ''),
                    trim($_POST['keywords'] ?? ''),
                    trim($_POST['excerpt'] ?? ''),
                    trim($_POST['description'] ?? '')
                );

                $_SESSION['success'] = 'Kateqoriya uğurla əlavə olundu!';
            } else {
                $_SESSION['errorr'][] = 'Kateqoriya əlavə oluna bilmədi';
            }

            // Yeniden yönlendir
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }





        $this->setMeta('Yeni Kateqoriya Əlavə Et');
        $this->set(compact('categor'));
    }






    public function editAction()
    {
        $categoryId = get('id');
        $parent_id = $_POST['category_select'] ?? 0;


        $categories = $this->model->get_category($categoryId);
        $categor = $this->model->getAllCategoriesWithDescription();


        if (!empty($_POST)) {
            try {

                if (!$categories) {
                    $_SESSION['error'] = 'Kateqoriya tapılmadı!';
                    header('Location: http://e-market.loc/admin/category');
                    exit;
                }

                // Validate the form inputs
                $this->validateCategoryForm();

                // Handle image upload
                $imagePath = $this->model->uploadCategoryImage($_FILES['category_image']);

                // Update category details
                $this->model->category_update(
                    $categoryId,
                    $parent_id,
                    $_POST['category_name'],
                    $_POST['excerpt'],
                    $_POST['description'],
                    $_POST['keywords'],
                    $_POST['slug'],
                    $imagePath
                );

                // Set success message in session
                $_SESSION['success'] = 'Kateqoriya uğurla yeniləndi!';

                // Redirect to the edit page or the category list page
                header('Location:http://e-market.loc/admin/category'); // Adjust this path to the page you want
                exit;
            } catch (\Exception $e) {
                // Catch any exception and set error message
                $_SESSION['error'] = $e->getMessage();
                header('Location: http://e-market.loc/admin/category/edit?id=60');  // Redirect to error page or back to the form
                exit;
            }
        }

        // Set meta information for the page
        $this->setMeta('Kateqoriya redaktəsi');
        $this->set(compact('categories', 'categor'));
    }




    public function deleteAction()
    {
        $categoryId = get('id');

        $result = $this->model->delete_category($categoryId);
        if ($result) {
            $_SESSION['success'] = 'Kateqoriya silindi';
        }
        redirect();
    }

}










