<?php


namespace App\Controllers\Admin;

use app\controllers\admin\AppController;
use app\models\admin\User;

/** @property User $model */
class UserController extends AppController
{
    public function indexAction()
    {
        $page = (int) ($_GET['page'] ?? 1);
        $limit = 3;
        $offset = ($page - 1) * $limit;


        $search = $_GET['search'] ?? '';


        if ($search) {
            $users = $this->model->get_users($limit, $offset, $search);
        } else {
            $users = $this->model->get_users($limit, $offset);
        }


        $totalUsers = $this->model->get_total_users($search);
        $totalPages = ceil($totalUsers / $limit);


        $this->setMeta('İstifadəçilər');


        $this->set(compact('users', 'totalPages', 'page'));
    }

    public function deleteAction()
    {
        $user_id = $_GET['id'];

        if (!empty($user_id)) {
            $this->model->user_delete($user_id);
            $_SESSION['success'] = 'İstifadəçi uğurla silindi!';
        } else {
            $_SESSION['error'] = "Geçersiz kullanıcı ID.";
        }

        redirect();
    }

    public function editAction()
    {

        $userID = $_GET['id'] ?? null;

        if (!$userID) {
            $_SESSION['error'] = "Geçersiz kullanıcı ID.";
            header('Location: http://e-market.loc/admin/user');
            exit;
        }


        $user = $this->model->get_user($userID);

        if (empty($user)) {
            $_SESSION['error'] = "Kullanıcı bulunamadı.";
            header('Location: http://e-market.loc/admin/user');
            exit;
        }


        $this->setMeta('İstifadəçi Düzəlişi');


        $this->set(compact('user'));
    }



    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userID = $_POST['id'] ?? null;

            if (!$userID) {
                $_SESSION['error'] = "Etibarsız istifadəçi ID-si.";
                $this->redirect('/admin/user');
            }

            // Formdan gələn məlumatları al və təmizlə
            $fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password'] ?? ''); // Parol boş qala bilər
            $address = trim($_POST['address']);
            $role = trim($_POST['role']);

            // Parolun yenilənməsi üçün yoxlama
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $hashedPassword = null; // Parol yenilənməyəcək
            }

            // İstifadəçini modeldə yenilə
            $result = $this->model->update_user(
                $userID,
                $fullname,
                $email,
                $hashedPassword,
                $address,
                $role
            );

            if ($result) {
                $_SESSION['success'] = "İstifadəçi məlumatları uğurla yeniləndi.";
            } else {
                $_SESSION['error'] = "İstifadəçi məlumatları yenilənə bilmədi.";
            }

            redirect();
        }

        $_SESSION['error'] = "Etibarsız sorğu.";
        redirect();
    }



}
