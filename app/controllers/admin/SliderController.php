<?php

namespace app\controllers\admin;

use app\controllers\admin\AppController;
use RedBeanPHP\R;

class SliderController extends AppController
{
    public function indexAction()
    {
        $sliders = $this->model->get_sliders();



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_FILES['image'])) {
                foreach ($_FILES['image']['tmp_name'] as $id => $tmp_name) {
                    if (!empty($tmp_name)) {
                        $slider = R::load('sliders', $id);
                        $imageName = $id . '.jpg';
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/slider/' . $imageName;


                        if (move_uploaded_file($tmp_name, $imagePath)) {
                            $slider->img = '/public/uploads/slider/' . $imageName;
                            R::store($slider);

                            $_SESSION['success'] = 'Slayder uğurla yeniləndi!';
                            header('Location: /admin/slider');
                            exit;
                        } else {
                            $_SESSION['error'] = 'Resim yüklənərkən xəta baş verdi.';
                        }
                    }
                }
            }


        }

        $this->setMeta('Slayderlər');
        $this->set(compact('sliders'));
    }

    public function deleteAction()
    {
        $id = $_GET['id'] ?? 0;

        if (!empty($id) && is_numeric($id)) {

            if ($this->model->slider_delete((int) $id)) {
                $_SESSION['success'] = 'Slayder uğurla silindi!';
            } else {
                $_SESSION['error'] = 'Slayder silinərkən bir problem yarandı!';
            }
        } else {
            $_SESSION['error'] = 'Keçərsiz ID!';
        }

        redirect();
    }

}
