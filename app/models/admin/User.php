<?php

namespace App\Models\Admin;

use RedBeanPHP\R;
use app\models\AppModel;

class User extends AppModel
{
    public function get_users($limit, $offset, $search = '')
    {

        if ($search) {
            return R::getAll(
                "SELECT * FROM user WHERE fullname LIKE ? LIMIT ? OFFSET ?",
                ['%' . $search . '%', (int) $limit, (int) $offset]
            );
        }

        return R::getAll("SELECT * FROM user LIMIT ? OFFSET ?", [(int) $limit, (int) $offset]);
    }


    public function get_user($id)
    {

        return R::getAll("SELECT * FROM user WHERE id = ?", [$id]);
    }

    public function update_user($id, $fullname, $email, $password, $address, $role)
    {
        // İstifadəçi obyektini tap
        $user = R::load('user', $id);

        // İstifadəçi tapılmadıysa, false qaytar
        if (!$user->id) {
            return false;
        }

        // Yeni məlumatları təyin et
        $user->fullname = $fullname;
        $user->email = $email;
        $user->address = $address;
        $user->role = $role;

        // Parol yenilənirsə, şifrəni yenilə
        if (!empty($password)) {
            $user->password = $password;  // Şifre hash'lenmiş olmalı
        }

        // Yenilənmiş məlumatları verilənlər bazasına yaz
        R::store($user);

        return true;
    }


    public function get_total_users($search = '')
    {

        if ($search) {
            return R::getCell(
                "SELECT COUNT(*) FROM user WHERE fullname LIKE ?",
                ['%' . $search . '%']
            );
        }

        return R::getCell("SELECT COUNT(*) FROM user");
    }


    public function user_delete($id)
    {
        return R::exec("DELETE FROM `user` WHERE id = ?", [$id]);
    }
}
