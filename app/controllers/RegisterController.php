<?php

namespace app\controllers;

use app\models\Register;
use Valitron\Validator;

/** @property Register $model */
class RegisterController extends AppController
{
    public function indexAction()
    {
        if (isset($_SESSION['user'])) {
            header("Location: http://e-market.loc/");
            exit;
        }

        $this->setMeta('Qeydiyyat');

        // Handle POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $address = $_POST['address'] ?? '';

            // Store form data in session for pre-filling
            $_SESSION['form_data'] = [
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'address' => $address,
            ];

            $v = new Validator([
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'address' => $address,
            ]);

            $v->rule('required', 'fullname')->message('Zəhmət olmasa Adınızı daxil edin');
            $v->rule('required', 'email')->message('Zəhmət olmasa E-Poçt daxil edin');
            $v->rule('email', 'email')->message('Zəhmət olmasa düzgün E-Poçt ünvanı daxil edin');
            $v->rule('required', 'password')->message('Zəhmət olmasa Şifrə daxil edin');
            $v->rule('lengthMin', 'password', 6)->message('Şifrəniz ən azı 6 simvoldan ibarət olmalıdır');
            $v->rule('required', 'address')->message('Zəhmət olmasa Ünvanınızı daxil edin');


            if (!$v->validate()) {
                // If validation fails, store errors in session and redirect back
                $_SESSION['errors'] = $v->errors();
                header("Location: /register");
                exit;
            }

            // Attempt to register the user
            $success = $this->model->register($fullname, $email, $password, $address);

            if ($success) {
                $_SESSION['success'] = "Təşəkkür edirik, qeydiyyatınız tamamlandı!";
                // Clear form data after successful registration
                unset($_SESSION['form_data']);
                header("Location: http://e-market.loc/login");
                exit;
            } else {
                $_SESSION['errors'] = 'Xəta baş verdi! İstifadəçi əlavə edilə bilmədi.';
                header("Location: http://e-market.loc/register");
                exit;
            }
        }
    }
}