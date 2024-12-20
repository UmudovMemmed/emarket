<?php

namespace app\controllers;

use app\models\Login;

use Valitron\Validator;

/** @property Login $model */
class LoginController extends AppController
{
    public function indexAction()
    {


        // Check if the user is already logged in
        if (isset($_SESSION['user'])) {
            header("Location: /");
            exit;
        }

        $this->setMeta('Daxil Ol');

        // Handle POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';



            $_SESSION['form_data'] = [
                'email' => $email,
                'password' => $password
            ];


            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'E-mail və ya şifrə boş ola bilməz!';
                header("Location: /login");
                exit;
            }


            $success = $this->model->login($email, $password);

            if ($success) {
                $_SESSION['success'] = "Uğurla daxil oldunuz!";
                unset($_SESSION['form_data']);
                header("Location: /");
                exit;
            } else {
                $_SESSION['error'] = 'E-mail və ya şifrə yanlışdır!';
                header("Location: /login");
                exit;
            }
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Müvəffəqiyyətlə çıxış etmisiniz.';
        header("Location: /");
        exit;
    }

    public function profileAction()
    {


        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = 'Əvvəlcə daxil olun.';
            header("Location: http://e-market.loc/login");
            exit;
        }
        $this->setMeta('Profil');
        $this->view = 'profile';

        $userId = $_SESSION['user']['id'];
        $limit = 3;
        $page = (int) ($_GET['page'] ?? 1);
        $offset = ($page - 1) * $limit;


        $orders = $this->model->Orders($userId, $limit, $offset);

        $totalOrders = $this->model->getOrderCount($userId);

        $totalPages = ceil($totalOrders / $limit);


        $this->set(compact('orders', 'page', 'totalPages'));
    }

    public function uptadeAction()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = 'Əvvəlcə daxil olun.';
            header("Location: http://e-market.loc/login");
            exit;
        }
        $this->setMeta('Dəyişdir');
        $this->view = 'uptade';

        if (isset($_POST['email'])) {
            $_SESSION['error'] = 'Xətalı cəhd edildi!';
            header("Location: http://e-market.loc/login/uptade");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($_POST['name'])) {
                $_SESSION['error'] = 'Ad ve Soyad Bos Buraxila Bilmez!';
                header("Location: http://e-market.loc/login/uptade");
                exit;
            }

            $_SESSION['form_data'] = [
                'name' => $name,
                'address' => $address
            ];

            $v = new Validator([
                'name' => $name,
                'address' => $address

            ]);

            $v->rule('regex', 'name', '/^(?!^\d+$)[a-zA-Z0-9\s]+$/')->message('Ad yalnız rəqəmlərdən ibarət ola bilməz.');

            $v->rule('regex', 'address', '/^(?!^\d+$)[a-zA-Z0-9\s]+$/')->message('Address yalnız rəqəmlərdən ibarət ola bilməz.');

            if (!$v->validate()) {
                // If validation fails, store errors in session and redirect back
                $_SESSION['errors'] = $v->errors();
                header("Location: http://e-market.loc/login/uptade");
                exit;
            }

            $success = $this->model->updateUser($name, $address, $password);

            if ($success) {
                $_SESSION['success'] = "İstifadəçi məlumatları uğurla yeniləndi!";
                header("Location: http://e-market.loc/login/profile");
                exit;
            } else {
                $_SESSION['error'] = "İstifadəçi tapılmadı!";
                header("Location: http://e-market.loc/login/uptade");
                exit;
            }




        }


    }




}