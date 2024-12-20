<?php
namespace app\models\admin;

use RedBeanPHP\R;
use app\models\AppModel;

class Category extends AppModel
{
    public function getAllCategoriesWithDescription(): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                          JOIN category_description cd ON c.id = cd.category_id");
    }


    public function get_category($id): array
    {
        return R::getAll("SELECT  cd.*, c.* FROM category_description cd 
            JOIN categories c ON c.id = cd.category_id WHERE category_id = ?", [$id]);
    }


    public function addCategory($parentId, $slug, $imagePath)
    {
        $category = R::dispense('categories');
        $category->parent_id = $parentId;
        $category->slug = $slug;
        $category->image = $imagePath;
        return R::store($category);
    }

    public function addCategoryDescription($categoryId, $title, $keywords, $excerpt, $description): int
    {
        return R::exec("INSERT INTO category_description (category_id, title, excerpt, description, keywords) VALUES (?,?,?,?,?)", [
            $categoryId,
            $title,
            $keywords,
            $excerpt,
            $description,
        ]);
    }


    public function category_update($id, $parent_id, $title, $excerpt, $description, $keywords, $slug, $imagePath): bool
    {

        R::begin();
        try {

            $category = R::load('categories', $id);
            if ($category->id === 0) {
                throw new \Exception('Category not found', 404);
            }

            $category->parent_id = $parent_id;
            $category->slug = $slug;
            $category->image = $imagePath;

            R::store($category);


            if (empty($title) || empty($excerpt) || empty($description)) {
                throw new \Exception('All description fields (title, excerpt, description) are required', 400);
            }


            R::exec(
                "UPDATE category_description 
                SET title = ?, excerpt = ?, description = ?, keywords = ? 
                WHERE category_id = ?",
                bindings: [
                    $title,
                    $excerpt,
                    $description,
                    $keywords,
                    $id
                ]
            );


            R::commit();
            return true;

        } catch (\Throwable $th) {

            R::rollback();


            error_log('Error in category_update: ' . $th->getMessage());


            throw $th;
        }
    }


    public function delete_category($id): bool
    {
        R::begin();
        try {
            // İlgili alt kategoriler var mı kontrol et
            $children = R::count('categories', 'parent_id = ?', [$id]);
            $products = R::count('products', 'category_id = ?', [$id]);

            if ($children) {
                $_SESSION['error'] = 'Kateqoriya aid alt kateqoriya var!';
                return false;
            }

            if ($products) {
                $_SESSION['error'] = 'Kateqoriya aid məhsul var!';
                return false;
            }

            // Önce kategori açıklamaları siliniyor
            R::exec('DELETE FROM category_description WHERE category_id = ?', [$id]);

            // Sonra kategori siliniyor
            R::exec('DELETE FROM categories WHERE id = ?', [$id]);

            // Commit işlemi
            return R::commit();
        } catch (\Throwable $th) {
            R::rollback();
            // Hata durumunda rollback yapıyoruz
            return false;
        }
    }


    public function uploadCategoryImage($file)
    {

        if (empty($file['name'])) {
            return '/public/uploads/no_image.jpg';
        }


        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];


        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            return false;
        }


        if ($fileSize > 5 * 1024 * 1024) {
            return false;
        }


        if ($fileError !== 0) {
            return false;
        }


        $newFileName = 'cat-' . time() . '.' . $fileExtension;


        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/images/';


        $filePath = $uploadDir . $newFileName;


        if (move_uploaded_file($fileTmpName, $filePath)) {

            return '/public/uploads/images/' . $newFileName;
        }


        return false;
    }









}
