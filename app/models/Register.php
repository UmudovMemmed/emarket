<?php

namespace app\models;

use RedBeanPHP\R;
use Exception;

class Register extends AppModel
{
    public function register($fullname, $email, $password, $address)
    {

        $existingUser = R::findOne('user', 'email = ?', [$email]);
        if ($existingUser) {
            $_SESSION['errors'] = 'Bu email ilə istifadəçi artıq mövcuddur!';
            return false;
        }


        $user = R::dispense('user');
        $user->fullname = $fullname;
        $user->email = $email;
        $user->address = $address;
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        try {
            R::store($user);
            $_SESSION["success"] = 'İstifadəçi qeydiyyatdan keçdi!';
            return true;
        } catch (Exception $e) {

            $_SESSION["errors"] = 'Xəta baş verdi!';
            return false;
        }
    }
}
