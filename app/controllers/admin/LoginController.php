<?php

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\admin\Login;

/** @property Login $model */
class LoginController extends AppController
{
    public function indexAction()
    {
        $this->layout = 'admin/login';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';


            $_SESSION['form_data'] = [
                'email' => $email,
                'password' => $password
            ];

            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Xahiş olunur, həm e-poçt, həm də şifrə daxil edin.';
            } else {

                if ($this->model->login($email, $password)) {

                    if ($_SESSION['user']['role'] == 'admin') {
                        header("Location: http://e-market.loc/admin");
                        exit;
                    } else {
                        $_SESSION['error'] = 'Sizin admin hüququnuz yoxdur!';
                        header("Location: http://e-market.loc/admin/login");
                        exit;
                    }

                } else {

                    $_SESSION['error'] = 'Yanlış e-poçt və ya şifrə.';
                    header("Location: http://e-market.loc/admin/login");
                    exit;
                }
            }
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        unset($_SESSION['user1']);
        header("Location: http://e-market.loc/admin/login");
        exit;
    }
}
