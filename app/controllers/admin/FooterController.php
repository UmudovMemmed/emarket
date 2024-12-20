<?php

namespace app\controllers\admin;
use Valitron\Validator;
use app\controllers\admin\AppController;
use app\models\admin\Footer;


/** @property Footer $model */

class FooterController extends AppController
{
    public function indexAction()
    {
        $pages = $this->model->get_pages();
        $this->set(compact('pages'));
        $this->setMeta('Footer');



    }

    public function editAction()
    {

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $_SESSION['error'] = 'Səhifə ID-si mövcud deyil.';
            header('Location: /admin/footer');
            exit;
        }


        $id = $_GET['id'];
        $page = $this->model->get_page($id);

        if (empty($page)) {
            $_SESSION['error'] = 'Səhifə tapılmadı.';
            header('Location: /admin/footer');
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $keywords = trim($_POST['keywords']);
            $description = trim($_POST['description']);
            $slug = trim($_POST['slug']);
            $url = trim($_POST['url']);



            $updated = $this->model->update_page($id, $title, $content, $keywords, $description, $slug, $url);


            if ($updated) {
                $_SESSION['success'] = 'Footer uğurla yeniləndi.';
                header('Location: /admin/footer');
                exit;
            } else {
                $_SESSION['error'] = 'Səhifə yenilənərkən xəta baş verdi.';
            }
        }

        $this->setMeta('Footer Yenilə');
        $this->set(compact('page'));
    }


    public function deleteAction()
    {
        $id = $_GET['id'];



        if (!isset($_GET['id']) || empty($_GET['id'])) {
            $_SESSION['error'] = 'Səhifə ID-si mövcud deyil.';
            header('Location: /admin/footer');
            exit;
        }



        if ($this->model->delete_page($id)) {
            $_SESSION['success'] = 'Səhifə uğurla silindi!';
        } else {
            $_SESSION['error'] = 'Səhifə tapılmadı və ya silinmə əməliyyatı uğursuz oldu.';
        }
        redirect();
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Məlumatları toplamaq
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $keywords = trim($_POST['keywords']);
            $description = trim($_POST['description']);
            $slug = trim($_POST['slug']);
            $url = trim($_POST['url']);

            // Validator sinfi ilə yoxlama
            $v = new Validator([
                'title' => $title,
                'content' => $content,
                'keywords' => $keywords,
                'description' => $description,
                'slug' => $slug,
                'url' => $url,
            ]);

            // Qaydaları müəyyən etmək
            $v->rule('required', 'title')->message('Başlıq sahəsi boş ola bilməz');
            $v->rule('required', 'content')->message('Məzmun sahəsi boş ola bilməz');
            $v->rule('required', 'keywords')->message('Açar sözlər sahəsi boş ola bilməz');
            $v->rule('required', 'description')->message('Təsvir sahəsi boş ola bilməz');
            $v->rule('required', 'slug')->message('Slug sahəsi boş ola bilməz');
            $v->rule('required', 'url')->message('URL sahəsi boş ola bilməz');


            // Əgər validasiya uğursuzsa
            if (!$v->validate()) {
                $_SESSION['errors'] = $v->errors();
                header('Location: /admin/footer/add'); // Eyni səhifəyə geri qayıt
                exit;
            }

            // Məlumatı əlavə etmək
            $updated = $this->model->add_page($title, $content, $keywords, $description, $slug, $url);

            if ($updated) {
                $_SESSION['success'] = 'Footer uğurla əlavə edildi.';
                header('Location: /admin/footer');
                exit;
            } else {
                $_SESSION['error'] = 'Səhifə əlavə edilərkən xəta baş verdi.';
            }
        }

        $this->setMeta('Yeni Footer Əlavə Et');
    }

}
