<?php


namespace App\Models\Admin;
use RedBeanPHP\R;
use app\models\AppModel;


class Product extends AppModel
{

    public function get_product()
    {

        return R::getAll("SELECT * FROM product_description pd INNER JOIN products p ON pd.product_id = p.id ");

    }

    public function get_products($id)
    {

        return R::getAll("SELECT * FROM product_description pd INNER JOIN products p ON pd.product_id = p.id WHERE product_id = ?", [$id]);

    }


    public function getAllCategoriesWithDescription(): array
    {
        return R::getAll("SELECT c.*, cd.* FROM categories c
                          JOIN category_description cd ON c.id = cd.category_id");
    }

    public function uploadProductImage($file)
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

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/images/';
        $newFileName = 'cat-' . time() . '.' . $fileExtension;
        $filePath = $uploadDir . $newFileName;


        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if (move_uploaded_file($fileTmpName, $filePath)) {
            return '/public/uploads/images/' . $newFileName;
        }

        return false;
    }


    public function product_update($id, $category_id, $title, $excerpt, $content, $description, $keywords, $slug, $imagePath): bool
    {
        R::begin();
        try {
            $product = R::load('products', $id);
            if ($product->id === 0) {
                throw new \Exception('Məhsul tapılmadı', 404);
            }

            $qty = $_POST['qty'] ?? 0;
            $price = $_POST['price'] ?? 0.00;
            $old_price = $_POST['old_price'] ?? 0.00;
            $color = $_POST['color'] ?? '';
            $status = $_POST['status'] ?? 1;
            $hit = $_POST['hit'] ?? 0;

            // Məhsulun əsas sahələrini yeniləyirik
            $product->category_id = $category_id;
            $product->slug = $slug;
            $product->qty = $qty;
            $product->price = $price;
            $product->old_price = $old_price;
            $product->color = $color;
            $product->status = $status;
            $product->hit = $hit;
            $product->img = $imagePath;

            R::store($product);

            // Məhsul təsviri yenilənməsi
            if (empty($title) || empty($excerpt) || empty($description)) {
                throw new \Exception('Təsvir sahələri boş ola bilməz', 400);
            }

            R::exec(
                "UPDATE product_description 
             SET title = ?, excerpt = ?, content = ?, description = ?, keywords = ? 
             WHERE product_id = ?",
                [$title, $excerpt, $content, $description, $keywords, $id]
            );

            R::commit();
            return true;

        } catch (\Throwable $th) {
            R::rollback();
            error_log('Xəta: ' . $th->getMessage());
            throw new \Exception('Xəta baş verdi: ' . $th->getMessage(), 500);
        }
    }





    public function addProduct($slug, $imagePath, $price, $oldPrice, $qty, $categoryId, $status, $hit, $color)
    {

        $product = R::dispense('products');
        $product->category_id = $categoryId;
        $product->slug = $slug;
        $product->qty = $qty;
        $product->price = $price;
        $product->old_price = $oldPrice;
        $product->status = $status;
        $product->hit = $hit;
        $product->img = $imagePath;
        $product->color = $color;


        return R::store($product);
    }

    public function addProductDescription(
        $productId,
        $productName,
        $excerpt,
        $content,
        $description,
        $keywords
    ): int {

        return R::exec("INSERT INTO product_description (product_id, title, excerpt, content, description, keywords) VALUES (?,?,?,?,?,?)", [
            $productId,
            $productName,
            $excerpt,
            $content,
            $description,
            $keywords
        ]);
    }



    public function delete_product($id): bool
    {
        R::begin();

        try {

            $product = R::load('products', $id);

            if (!$product->id) {
                $_SESSION['error'] = 'Məhsul tapılmadı!';
                R::rollback();
                return false;
            }


            R::exec('DELETE FROM product_description WHERE product_id = ?', [$id]);


            R::exec('DELETE FROM products WHERE id = ?', [$id]);

            R::commit();
            return true;
        } catch (\Throwable $th) {
            R::rollback();
            $_SESSION['error'] = 'Silinmə əməliyyatı uğursuz oldu!';
            return false;
        }
    }




}