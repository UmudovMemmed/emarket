<?php

namespace app\models;

use RedBeanPHP\R;
use Exception;

class Login extends AppModel
{
    public function login($email, $password)
    {


        $user = R::findOne('user', 'email = ?', [$email]);

        if (!$user) {
            $_SESSION['error'] = ['E-mail və ya şifrə yanlışdır!']; // User not found
            return false;
        }


        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'email' => $user->email,
                'fullname' => $user->fullname,
                'address' => $user->address,
                'role' => $user->role
            ];

            $_SESSION['user1'] = [

                'fullname' => $user->fullname,
                'address' => $user->address,
            ];

            return true;
        } else {
            $_SESSION['error'] = 'E-mail və ya şifrə yanlışdır!'; // Incorrect password
            return false;
        }
    }

    public function Orders($userId, $limit, $offset)
    {
        return R::getAll('SELECT * FROM orders WHERE user_id = ? LIMIT ? OFFSET ?', [$userId, $limit, $offset]);
    }

    public function getOrderCount($userId)
    {
        return R::getCell('SELECT COUNT(*) FROM orders WHERE user_id = ?', [$userId]);
    }

    public function updateUser($name, $address, $password)
    {
        // Sessiyadakı istifadəçi ID-sinə əsasən istifadəçi məlumatını yükləyirik
        $user = R::load('user', $_SESSION['user']['id']);


        if ($user->id) {


            if (!isset($_SESSION['user1'])) {
                $_SESSION['user1'] = [];
            }


            if (!empty($name)) {
                $user->fullname = $name;
                $_SESSION['user1']['fullname'] = $user->fullname;
            }


            if (!empty($address)) {
                $user->address = $address;
                $_SESSION['user1']['address'] = $user->address;
            }


            if (!empty($password)) {
                $user->password = password_hash($password, PASSWORD_DEFAULT);
            }


            R::store($user);



            return true;
        }

        return false;
    }








}
