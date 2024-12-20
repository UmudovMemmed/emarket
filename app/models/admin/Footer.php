<?php

namespace app\models\admin;

use RedBeanPHP\R;
use app\models\AppModel;

class Footer extends AppModel
{
    // Səhifələri əldə edən metod
    public function get_pages()
    {
        return R::getAll("SELECT p.*, pd.* FROM pages p JOIN pages_description pd ON p.id = pd.page_id");
    }

    public function get_page($id)
    {
        return R::getAll("SELECT p.*, pd.* FROM pages p JOIN pages_description pd ON p.id = pd.page_id WHERE p.id = ?", [$id]);
    }


    public function delete_page($id): bool
    {

        $page = R::load('pages', $id);


        if ($page->id) {

            R::exec('DELETE FROM pages_description WHERE page_id = ?', [$id]);


            R::exec('DELETE FROM pages WHERE id = ?', [$id]);

        } else {

            $_SESSION['error'] = 'Səhifə tapılmadı!';
            return false;
        }

        return true;
    }
    public function update_page($id, $slug = null, $title = null, $content = null, $keywords = null, $description = null, $url = null): bool
    {

        R::begin();

        try {

            $pages = R::load('pages', $id);


            if ($pages->id === 0) {
                throw new \Exception('Page not found', 404);
            }


            $pages->slug = $slug;


            R::store($pages);


            if (empty($title) || empty($content) || empty($description)) {
                throw new \Exception('All description fields (title, content, description) are required', 400); // 
            }


            R::exec(
                "UPDATE pages_description 
            SET title = ?, content = ?, description = ?, keywords = ?, url = ? 
            WHERE page_id = ?", // SQL query
                bindings: [
                    $title,         // Bind title value
                    $content,       // Bind content value
                    $description,   // Bind description value
                    $keywords,      // Bind keywords value
                    $url,           // Bind URL value
                    $id             // Bind the page/category ID for the update
                ]
            );

            R::commit();

            return true;

        } catch (\Throwable $th) {

            R::rollback();


            error_log('Error in page_update: ' . $th->getMessage());

            // Rethrow the error to be handled by the calling code
            throw $th;
        }
    }


    public function add_page($slug = null, $title = null, $content = null, $keywords = null, $description = null, $url = null): bool
    {
        R::begin();

        try {
            // Boşluqları yoxlamaq
            if (empty($title) || empty($content) || empty($description)) {
                throw new \Exception('Bütün sahələr (title, content, description) tələb olunur', 400);
            }

            // Yeni səhifə üçün əsas məlumatları əlavə etmək
            $page = R::dispense('pages'); // Yeni "pages" cədvəlində boş obyekt yaradılır
            $page->slug = $slug;
            $pageId = R::store($page); // Əsas səhifəni saxlamaq və ID almaq

            // "pages_description" cədvəlinə təsvir və digər məlumatları əlavə etmək
            R::exec(
                "INSERT INTO pages_description (page_id, title, content, description, keywords, url) 
            VALUES (?, ?, ?, ?, ?, ?)",
                [
                    $pageId,      // Əsas səhifənin ID-si
                    $title,       // Başlıq
                    $content,     // Məzmun
                    $description, // Təsvir
                    $keywords,    // Açar sözlər
                    $url          // URL
                ]
            );

            R::commit();

            return true;

        } catch (\Throwable $th) {
            R::rollback();

            error_log('Error in add_page: ' . $th->getMessage());

            // Xətanı çağıran koda ötür
            throw $th;
        }
    }





}